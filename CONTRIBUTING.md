# Contributing

Contributions are **welcome** and will be fully **credited**.

We accept contributions via Pull Requests on [Github](https://github.com/ruifernandees/csv-json-converter).


## Pull Requests

- **[PSR-12 Coding Standard](https://www.php-fig.org/psr/psr-12/)** - The easiest way to apply the conventions is to use [PHP Code Sniffer](http://pear.php.net/package/PHP_CodeSniffer).

- **Add tests!** - Your patch won't be accepted if it doesn't have tests.

- **Document any change in behaviour** - Make sure the README and any other relevant documentation are kept up-to-date.

- **Consider our release cycle** - We try to follow SemVer. Randomly breaking public APIs is not an option.

- **Create topic branches** - Don't ask us to pull from your main branch.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

- **Send coherent history** - Make sure each individual commit in your pull request is meaningful. If you had to make multiple intermediate commits while developing, please squash them before submitting.

- **Ensure tests pass!** - Please run the tests (see below) before submitting your pull request, and make sure they pass. We won't accept a patch until all tests pass.

- **Ensure no coding standards violations** - Please run PHP Code Sniffer using the PSR-12 standard (see below) before submitting your pull request.

## Check and fix style
Check:
```bash
$ composer check-style
```

Fix:
```bash
$ composer fix-style
```

## Testing

The following tests must pass for a build to be considered successful. If contributing, please ensure these pass before submitting a pull request.

``` bash
$ composer test
```

## References
This CONTRIBUTING file is based on the [league/oauth2-client's CONTRIBUTING file](https://github.com/thephpleague/oauth2-client/blob/master/CONTRIBUTING.md)

**Happy coding**!