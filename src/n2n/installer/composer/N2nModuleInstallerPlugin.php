<?php
namespace n2n\installer\composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class N2nModuleInstallerPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new N2nModuleInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}