<?php declare(strict_types=1);

/**
 * Based on code released under a BSD-style license. For complete license text
 * see http://sgraastra.net/code/license/.
 */

namespace StudyPortals\CMS\Module;

use StudyPortals\Template\TemplateNodeTree;

/**
 * ModuleNode
 *
 * Can be used to insert nodes with arbitrary content (i.e. mainly generated
 * HTML) into an existing template-tree. Used by {@link Module} to easily
 * insert HTML generated by module's into a page-template.
 */

class ModuleNode extends TemplateNodeTree
{

    /**
     * @var string $html
     */

    private $html;

    public function __construct(string $name, string $html)
    {

        $this->html = $html;

        /*
         * Assign a globally unique name to the Node. Node-names cannot consist
         * solely of digits - MD5 hashes sometimes do - so we prepend an
         * underscore to prevent that eventuality...
         */
        $name = '_' . md5(uniqid($name, true));

        parent::__construct($name);
    }

    public function display(): string
    {

        return $this->html;
    }
}
