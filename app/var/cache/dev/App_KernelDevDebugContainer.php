<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerIYesmDD\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerIYesmDD/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerIYesmDD.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerIYesmDD\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerIYesmDD\App_KernelDevDebugContainer([
    'container.build_hash' => 'IYesmDD',
    'container.build_id' => '003f5313',
    'container.build_time' => 1709922203,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerIYesmDD');