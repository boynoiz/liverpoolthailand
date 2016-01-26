<?php

namespace LTF\Http\Controllers\Admin;

use LTF\Base\Controllers\AdminController;
use LTF\Http\Requests\Admin\SettingRequest;
use LTF\Setting;

class SettingController extends AdminController
{
    /**
     * Image column of the model
     *
     * @var string
     */
    private $imageColumn = "logo";

    /**
     * Show the form for editing the settings.
     *
     * @return Response
     */
    public function getSettings()
    {
        $setting = Setting::firstOrFail();
        return $this->getForm($setting);
    }

    /**
     * Update the settings in storage.
     *
     * @param Setting $setting
     * @param SettingRequest $request
     * @return Response
     */
    public function patchSettings(Setting $setting, SettingRequest $request)
    {
        return $this->saveFlashRedirect($setting, $request, $this->imageColumn);
    }
}