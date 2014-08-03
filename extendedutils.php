<?php

/*
 * Prestashop Utils - a module template for Prestashop v1.6+
 * Copyright (C) 2014 kuzmany.biz
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

if (!defined('_PS_VERSION_'))
    exit;

require_once(_PS_MODULE_DIR_ . 'extendedutils/models/extendedutils_smarty.php');

class ExtendedUtils extends Module {

    public function __construct() {
        $this->name = 'extendedutils';
        $this->tab = 'front_office_features';
        $this->version = '1.0';
        $this->author = 'kuzmany.biz/prestashop';
        $this->need_instance = 0;
        $this->trusted = 1;
        // $this->dependencies = array('blockcart');

        parent::__construct();

        $this->displayName = $this->l('Extened Utils');
        $this->description = $this->l('Some stuff for Prestashop');
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
    }

    /**
     * install
     */
    public function install() {
        if (!parent::install() ||
                !$this->registerHook('displayHeader'))
            return false;
        return true;
    }

    /**
     * uninstall
     */
    public function uninstall() {
        if (!parent::uninstall())
            return false;
        return true;
    }

    public function hookHeader($params) {
        if (!isset($this->context->smarty->registered_plugins['function']['get_template_vars'])) {
            $this->context->smarty->registerPlugin('function', 'get_template_vars', array('extendedutils_smarty', 'get_template_vars'));
        }
        
    }

}

?>
