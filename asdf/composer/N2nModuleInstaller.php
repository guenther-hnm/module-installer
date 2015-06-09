<?php
namespace composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class N2nModuleInstaller extends LibraryInstaller {

    /**
     * {@inheritDoc}
     */
    public function getPackageBasePath(PackageInterface $package){
        $prefix = substr($package->getPrettyName(), 0, 16);
        if ('asdf/n2n-module-' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install template, phpdocumentor templates '
                .'should always start their package name with '
                .'"phpdocumentor/template-"'
            );
        }
    
        return 'app/module/'. substr($package->getPrettyName(), 16);
    }
    
    /**
     * {@inheritDoc}
     */
    public function supports($packageType){
        return 'n2n-module' === $packageType;
    }
}