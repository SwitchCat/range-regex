<?php

namespace SwitchCat\RangeRegex;

final class ConverterDefault implements Converter
{
    public function toRegex(Range $range):string
    {
        $min = $range->getMin();
        $max = $range->getMax();

        if ($min === $max) {
            return $min;
        }
        /*
        if ($min > $max) {
            return sprintf('%d|%d', $min, $max);
        }        
*/
        $positives = [];
        $negatives = [];

        if ($min < 0) {
            $newMin = 1;
            $newMin = ($max < 0) ? abs($max) : $newMin;
            $newMax = abs($min);
            $negatives = $this->splitToPatterns($newMin, $newMax);
            $min = 0;
        }

        $positives = ($max >= 0) ? $this->splitToPatterns($min, $max) : $positives;

        return $this->siftPatterns($negatives, $positives);
    }

    private function splitToRanges(int $min, int $max):array
    {
        $nines = 1;
        $stops = [$max];
        $stop = $this->countNines($min, $nines);

        while ($min <= $stop && $stop <= $max) {
            if (in_array($stop, $stops, true) === false) {
                $stops[] = $stop;
            }

            $nines++;
            $stop = $this->countNines($min, $nines);
        }

        $zeros = 1;
        $stop = $this->countZeros($max + 1, $zeros) - 1;

        while ($min < $stop && $stop <= $max) {
            if (in_array($stop, $stops, true) === false) {
                $stops[] = $stop;
            }

            $zeros += 1;
            $stop = $this->countZeros($max + 1, $zeros) - 1;
        }
        sort($stops);
        return $stops;
    }

    private function splitToPatterns($min, $max):array
    {
        $start = $min;
        $subPatterns = [];
        $ranges = $this->splitToRanges($min, $max);
        foreach ($ranges as $index => $range) {
            $subPatterns[$index] = $this->rangeToPattern($start, $range);
            $start = $range + 1;
        }
        return $subPatterns;
    }

    private function siftPatterns(array $negatives, array $positives):string
    {
        $onlyNegative = $this->filterPatterns($negatives, $positives, '-');
        $onlyPositives = $this->filterPatterns($positives, $negatives, '');
        $intersected = $this->filterPatterns($negatives, $positives, '-?', true);
        $subPatterns = array_merge($onlyNegative, $intersected, $onlyPositives);

        return implode('|', $subPatterns);
    }

    private function filterPatterns(array $arr, array $comparison, string $prefix, bool $intersection = false):array
    {
        $intersected = [];
        $result = [];
        foreach ($arr as $element) {
            if ($intersection === false && in_array($element, $comparison, true) === false) {
                $result[] = $prefix . $element;
            }

            if ($intersection && in_array($element, $comparison, true)) {
                $intersected[] = $prefix . $element;
            }
        }

        return $intersection ? $intersected : $result;
    }

    private function rangeToPattern(int $start, int $stop):string
    {
        $pattern = '';
        $digits = 0;
        $pairs = $this->zip($start, $stop);
        foreach ($pairs as $pair) {
            $startDigit = $pair[0];
            $stopDigit = $pair[1];

            if ($startDigit === $stopDigit) {
                $pattern .= $startDigit;
                continue;
            }

            if ($startDigit !== '0' || $stopDigit !== '9') {
                $pattern .= sprintf('[%d-%d]', $startDigit, $stopDigit);
                continue;
            }

            $digits++;
        }

        $pattern .= ($digits > 0) ? '[0-9]' : '';
        $pattern .= ($digits > 1) ? sprintf('{%d}', $digits) : '';

        return $pattern;
    }

    private function countNines(int $num, int $nines):int
    {
        return (int)(mb_substr((string)$num, 0, ((-1) * $nines)) . str_repeat('9', $nines));
    }

    private function countZeros(int $integer, int $zeros):int
    {
        return $integer - ($integer % pow(10, $zeros));
    }

    private function zip(int $start, int $stop):array
    {
        $start = str_split((string) $start);
        $stop = str_split((string) $stop);

        $zipped = [];
        foreach ($start as $index => $char) {
            $zipped[] = [$char, $stop[$index]];
        }

        return $zipped;
    }
}
