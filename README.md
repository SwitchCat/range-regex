<!-- PROJECT SHIELDS -->
[![Twitter Follow](https://img.shields.io/twitter/follow/SwitchcatA?style=social)](https://twitter.com/SwitchcatA)
[![Issues](https://img.shields.io/github/issues/SwitchCat/range-regex.svg?style=flat-square)](https://github.com/SwitchCat/range-regex/issues)
![GitHub All Releases](https://img.shields.io/github/downloads/SwitchCat/range-regex/total?logo=GitHub)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
<img src="https://img.shields.io/static/v1?label=SwitchCat&message=Framework&color=ff7701&style=flat-square" />

<br>
<p align="center">
  <h1 align="center">SwitchCat/range-regex</h1>
</p>

<!-- TABLE OF CONTENTS -->
## Table of Contents

* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Installation](#installation)
* [Usage](#usage)
* [Contributing](#contributing)
* [License](#license)
* [Contact](#contact)
* [Acknowledgements](#acknowledgements)

<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple steps.

<!-- PREREQUISITES -->
### Prerequisites

* PHP7.4+
* ext-mbstring
* [Composer](https://getcomposer.org/)

<!-- INSTALLATION -->
### Installation

Use composer from the root of your project folder to download the library.
```sh
composer require switchcat/range-regex
```

<!-- USAGE EXAMPLES -->
## Usage

<p>All method return an array containing either the element's data either an array of elements with their data.</p>

* Create the periodic object
```sh
use SwitchCat\RangeRegex\FactoryDefault;
use SwitchCat\RangeRegex\Range;

$Factory = new FactoryDefault();
$converter = $Factory->getConverter();
$Range = new Range(int $min, int $max);

$regex = sprintf('/^(%s)$/', $converter->toRegex($Range));
// /^([1-9]|[1-9][0-9]|[1-9][0-9]{2}|[1-2][0-9]{3}|3[0-3][0-9]{2}|34[0-4][0-9]|345[0-6])$/
```

<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.

<!-- CONTACT -->
## Contact

<a href="https://switchcat.agency" ><img src="https://img.shields.io/static/v1?label=SwitchCat&message=Agency&color=ff7701&style=for-the-badge" /></a>

<!-- ACKNOWLEDGEMENTS -->
## Acknowledgements 

- <a href="https://github.com/hansott/range-regex" >hansott/range-regex</a>
- <a href="https://github.com/micromatch/to-regex-range" >micromatch/to-regex-range</a>
- <a href="https://github.com/jonschlinkert/to-regex-range" >jonschlinkert/to-regex-range</a>

## Credits

- <a href="https://github.com/hansott" >Hans Ott</a>
