[![](https://img.shields.io/badge/PHP-%5E7.2-blue)](https://github.com/KEINOS/Practice_GitHub_Action-Win_PHP/blob/master/composer.json#L6 "Supported version")
[![](https://img.shields.io/github/workflow/status/KEINOS/Practice_GitHub_Action-Win_PHP/PHP%20over%20Windows)](https://github.com/KEINOS/Practice_GitHub_Action-Win_PHP/actions "View workflow status on GitHub")
[![](https://github.com/KEINOS/Practice_GitHub_Action-Win_PHP/workflows/Test%20on%20Win/badge.svg)](https://github.com/KEINOS/Practice_GitHub_Action-Win_PHP/actions?query=workflow%3A%22Test%20on%20Win%22 "View workflow status on GitHub")
[![](https://github.com/KEINOS/Practice_GitHub_Action-Win_PHP/workflows/Test%20on%20Mac/badge.svg)](https://github.com/KEINOS/Practice_GitHub_Action-Win_PHP/actions?query=workflow%3A%22Test%20on%20Mac%22 "View workflow status on GitHub")
[![](https://github.com/KEINOS/Practice_GitHub_Action-Win_PHP/workflows/Test%20on%20Linux/badge.svg)](https://github.com/KEINOS/Practice_GitHub_Action-Win_PHP/actions?query=workflow%3A%22Test%20on%20Linux%22 "View workflow status on GitHub")

# GitHub Action Sample for PHP7 and Box3 for Win/Mac/Linux

This repo is a sample to run PHP/composer/[Box3](https://github.com/humbug/box) on [GitHub Actions](https://help.github.com/en/actions/getting-started-with-github-actions/about-github-actions) as a CI.

Aimed to **test the compiled (Phar archived) file function-ability on Windows, macOS and Ubuntu**.

## Workflow

Once a commit is `push`ed or `Pull Request`ed GitHub will run [the workflow](https://github.com/KEINOS/Practice_GitHub_Action-Win_PHP/blob/master/.github/workflows/php-win.yml) which does the following:

1. Boots the following virtual environment as a runner.
    - `windows-latest` as Windows Server 2019
    - `macos-latest` as macOS Catalina 10.15
    - `ubuntu-latest` as Ubuntu 18.04
2. Checkouts the repo.
3. Sets up the following PHP.
    - v7.2, v7.3 and v7.4
4. Installs dependencies of the sample script via composer.
5. Compiles the sample script to a Phar file with [Box3](https://github.com/humbug/box).
    - Compile command: `composer compile` (See: Notes)
    - Output file: `./bin/sample`
6. Runs the compiled phar file using runtime.
    - `php ./bin/sample`
7. Runs the compiled phar using shebang.
    - `./bin/sample`

## Notes

- The workflow
  - [./.github/workflows/php-win.yml](https://github.com/KEINOS/Practice_GitHub_Action-Win_PHP/blob/master/.github/workflows/php-win.yml)
  - Basically **this is the only file you needed** to add/change to let GitHub Actions work.
- Sample script to be Phar archived via Box3
  - [./src](https://github.com/KEINOS/Practice_GitHub_Action-Win_PHP/blob/master/src)
- Archive Settings (Configuration file for Box3)
  - [box.json](https://github.com/KEINOS/Practice_GitHub_Action-Win_PHP/blob/master/box.json)
- Composer custom user command to compile/archive the script to Phar

    ```json
    "scripts": {
        "compile": "php ./vendor/bin/box compile"
    }
    ```

## References

- ["Add function-ability testing for Windows"](https://github.com/humbug/box/issues/459) | Issues | humbug/box @ GitHub [![GitHub issue/pull request detail](https://img.shields.io/github/issues/detail/state/humbug/box/459)](https://github.com/humbug/box/issues/459 "Status badge of Issue 459")
- [Write Your GitHub Actions Workflow for Build Windows Application](https://medium.com/rkttu/write-your-github-actions-workflow-for-build-windows-application-94e5a989f477) @ Medium
- [Github Action for PHP packages](https://dev.to/shivammathur/github-action-for-php-packages-2pii) @ dev.to
- [Supported runners and hardware resources](https://help.github.com/en/actions/reference/virtual-environments-for-github-hosted-runners#supported-runners-and-hardware-resources) | Virtual environments for GitHub-hosted runners @ GitHub Help
