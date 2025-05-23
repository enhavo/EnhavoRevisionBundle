<?php

/*
 * This file is part of the enhavo package.
 *
 * (c) WE ARE INDEED GmbH
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Enhavo\Bundle\RevisionBundle\Delete;

use Enhavo\Bundle\ResourceBundle\Delete\DeleteHandlerInterface;
use Enhavo\Bundle\RevisionBundle\Model\RevisionInterface;
use Enhavo\Bundle\RevisionBundle\Revision\RevisionManager;
use Psr\Container\ContainerInterface;
use Symfony\Contracts\Service\ServiceSubscriberInterface;

class SoftDeleteHandler implements DeleteHandlerInterface, ServiceSubscriberInterface
{
    private ContainerInterface $container;

    public function __construct(
        private readonly DeleteHandlerInterface $deleteHandler,
    ) {
    }

    public static function getSubscribedServices(): array
    {
        return [
            RevisionManager::class => RevisionManager::class,
        ];
    }

    public function delete(object $resource): void
    {
        if ($resource instanceof RevisionInterface) {
            $this->container->get(RevisionManager::class)->softDelete($resource);
        } else {
            $this->deleteHandler->delete($resource);
        }
    }

    public function setContainer(ContainerInterface $container): void
    {
        $this->container = $container;
    }
}
