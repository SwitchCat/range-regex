<?php declare(strict_types=1);
include 'vendor/autoload.php';
?>
<h1>SwitchCat/range-regex</h1>
<?php

use \SwitchCat\RangeRegex\FactoryDefault;
use \SwitchCat\RangeRegex\Range;

if(isset($_POST))
{
    if(isset($_POST['min']) && isset($_POST['max']))
    {
        $Factory = new FactoryDefault();
        $converter = $Factory->getConverter();
        $Range = new Range((int)$_POST['min'], (int)$_POST['max']);

        $regex = sprintf('/^(%s)$/', $converter->toRegex($Range));

        echo '<h3>Regex capturing numbers from ' . $_POST['min'] . ' to ' . $_POST['max'] . ': ' . $regex . '</h3>';
    }
}
?>
<form method="post" name="regex" action="">
    <label for="min">Start:</label><input type="number" name="min">
    <label for="max">Stop:</label><input type="number" name="max">
    <input type="submit" value="Generate regex">
</form>