<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container4S0QPlK\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container4S0QPlK/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container4S0QPlK.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container4S0QPlK\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container4S0QPlK\App_KernelDevDebugContainer([
    'container.build_hash' => '4S0QPlK',
    'container.build_id' => '17d8cce8',
    'container.build_time' => 1618918153,
], __DIR__.\DIRECTORY_SEPARATOR.'Container4S0QPlK');
