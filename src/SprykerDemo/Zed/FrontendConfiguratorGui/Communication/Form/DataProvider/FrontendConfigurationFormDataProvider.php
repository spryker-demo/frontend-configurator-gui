<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\FrontendConfiguratorGui\Communication\Form\DataProvider;

use SprykerDemo\Zed\FrontendConfigurator\Business\FrontendConfiguratorFacadeInterface;
use SprykerDemo\Zed\FrontendConfiguratorGui\FrontendConfiguratorGuiConfig;

class FrontendConfigurationFormDataProvider
{
    /**
     * @var \SprykerDemo\Zed\FrontendConfigurator\Business\FrontendConfiguratorFacadeInterface
     */
    protected FrontendConfiguratorFacadeInterface $frontendConfigFacade;

    /**
     * @param \SprykerDemo\Zed\FrontendConfigurator\Business\FrontendConfiguratorFacadeInterface $frontendConfigFacade
     */
    public function __construct(FrontendConfiguratorFacadeInterface $frontendConfigFacade)
    {
        $this->frontendConfigFacade = $frontendConfigFacade;
    }

    /**
     * @return array<string, string>
     */
    public function getData(): array
    {
        $frontendConfiguratorTransfer = $this->frontendConfigFacade->getFrontendConfiguration();

        return array_merge(
            $frontendConfiguratorTransfer->getData(),
            [
                'logoUrl' => $frontendConfiguratorTransfer->getData()[FrontendConfiguratorGuiConfig::FRONTEND_GUI_FIELD_LOGO_FILE] ?? null,
                'backofficeLogoUrl' => $frontendConfiguratorTransfer->getData()[FrontendConfiguratorGuiConfig::FRONTEND_GUI_FIELD_BACKOFFICE_LOGO_FILE] ?? null,
            ],
        );
    }
}
