<?php

#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Extended Utils for Prestashop by kuzmany.biz
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# However, as a special exception to the GPL, this software is distributed
# as an addon module to CMS Made Simple.  You may not use this software
# in any Non GPL version of CMS Made simple, or in any version of CMS
# Made simple that does not indicate clearly and obviously in its admin
# section that the site was built with CMS Made simple.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------
#END_LICENSE

class extendedutils_smarty extends Module {

    public static function get_template_vars($params) {
        $smarty = Context::getContext()->smarty;
        $tpl_vars = $smarty->tpl_vars;

        $str = '<pre>';
        foreach ($tpl_vars as $key => $value) {
            if (is_object($value)) {
                $str .= "$key = Object<br/>";
            } else if (is_array($value)) {
                $str .= "$key = Array (" . count($value) . ")<br/>";
            } else {
                $str .= "$key = " . (trim($value)) . "<br/>";
            }
        }
        $str.='</pre>';

        if (isset($params['assign'])) {
            $smarty->assign(trim($params['assign']), $str);
            return;
        }
        return $str;
    }

}

?>