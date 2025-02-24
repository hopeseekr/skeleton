#!/usr/bin/env php
<?php

/*************************************************
 *      ●●● ●●● ●●● ●●● ●●● ●●● ●●● ●●● ●●●      *
 *     ●●●                               ●●●     *
 *    ● PHP Experts, Inc's Skeleton Install ●    *
 *   ●●● ●●●                           ●●● ●●●   *
 *  ●   ●   ●            ●            ●   ●   ●  *
 * ●●● ●●● ●●●          ●●●          ●●● ●●● ●●● *
 *  ●   ●   ●●●     ●●●     ●●●     ●●●   ●   ●  *
 *   ●●● ●●●   ●     ●   ●   ●     ●   ●●● ●●●   *
 *    ●   ●●● ●●●   ●●●     ●●●   ●●● ●●●   ●    *
 *     ●●●   ●   ●      ●●●      ●   ●   ●●●     *
 *      ●●● ●●● ●●●      ●      ●●● ●●● ●●●      *
 *       ●   ●   ●●●           ●●●   ●   ●       *
 *        ●●● ●●●   ●         ●   ●●● ●●●        *
 *         ●   ●   ●●●       ●●●   ●   ●         *
 *          ●●● ●●●   ●     ●   ●●● ●●●          *
 *           ●   ●   ●●●   ●●●   ●   ●           *
 *            ●●● ●●●   ●●●   ●●● ●●●            *
 *             ●   ●     ●     ●   ●             *
 *       ●      ● ●●●   ●●●   ●●● ●      ●       *
 *      ●●●      ●   ●●●   ●●●   ●      ●●●      *
 *  ●●●     ●●●   ●   ●     ●   ●   ●●●     ●●●  *
 *   ●   ●   ●     ● ●●●   ●●● ●     ●   ●   ●   *
 *  ●●●     ●●●     ●   ●●●   ●     ●●●     ●●●  *
 *      ●●●          ●   ●   ●          ●●●      *
 *       ●            ●●● ●●●            ●       *
 *************************************************/

function getProjectFiles(): array
{
    return [
        './composer.json',
        './tests/TestCase.php',
    ];
}

function replaceProjectName(string $filename, string $newName): void
{
    $origText = file_get_contents($filename);
    $newText = str_replace('Skeleton', $newName, $origText);

    if ($newText !== $origText) {
        file_put_contents($filename, $newText);
    }
}

function installGitAttributes()
{
    rename('_gitattributes', '.gitattributes');
}

function main()
{
    // Get the project name from the CWD.
    $project = basename(__DIR__);

    installGitAttributes();

    // Replace "Skeleton" with $project in every PHP file.
    $files = getProjectFiles();
    foreach ($files as $filename) {
        replaceProjectName($filename, $project);
    }

    echo "\nYou must edit the following files:\n\n";
    foreach (['README.md', 'composer.json',  'The .php_cs header'] as $file) {
        echo " - $file\n";
    }

    echo "\nDelete every LICENSE you do not want.\n";

    echo "\bNote: This install.php file has deleted itself.\n";
    unlink('src/.gitkeep');
    unlink('install.php');
}

main();
