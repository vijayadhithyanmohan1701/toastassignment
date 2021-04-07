<?php

namespace SilverStripe\AssetAdmin\Extensions;

use SilverStripe\Assets\Folder;
use SilverStripe\Assets\Shortcodes\FileLink;
use SilverStripe\Core\Extension;
use SilverStripe\ORM\ArrayList;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Member;

/**
 * Hides several types of DataObjects on the "Used On" tab when viewing files
 */
class UsedOnTableExtension extends Extension
{
    /**
     * @var array $excludedClasses
     */
    public function updateUsageExcludedClasses(array &$excludedClasses)
    {
        $excludedClasses[] = FileLink::class;
        $excludedClasses[] = Member::class;
    }

    /**
     * Legacy function kept for semver, replaced with updateUsageExcludedClasses above
     *
     * @var ArrayList $usage
     * @var DataObject $record
     * @see UsedOnTable::updateUsage
     * @deprecated 4.7.0 Use self::updateUsageExcludedClasses instead
     */
    public function updateUsage(ArrayList &$usage, DataObject &$record)
    {
        // noop
    }

    /**
     * @param DataObject $dataObject|null
     */
    public function updateUsageDataObject(?DataObject &$dataObject)
    {
        if ($dataObject instanceof Folder) {
            $dataObject = null;
        }
    }
}
