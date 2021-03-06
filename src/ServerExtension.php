<?php

/*
 * This file is part of the Panther project.
 *
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Symfony\Component\Panther;

use PHPUnit\Runner\AfterLastTestHook;
use PHPUnit\Runner\BeforeFirstTestHook;

/**
 *  @author Dany Maillard <danymaillard93b@gmail.com>
 */
final class ServerExtension implements BeforeFirstTestHook, AfterLastTestHook
{
    use ServerTrait;

    public function executeBeforeFirstTest(): void
    {
        $this->keepServerOnTeardown();
    }

    public function executeAfterLastTest(): void
    {
        $this->stopWebServer();
    }
}
