<?php
defined('IN_HKINGPHP') or exit('Access Denied');
hg_base::load_sys_class('form', '', 0);
hg_base::load_sys_class('forms', '', 0);
class content_form
{

    public $modelid;

    function __construct($modelid)
    {
        $this->modelid = $modelid;
    }

    public function content_other($val)
    {
//        var_dump($val);
//        die();
    }

    public function tag_start($tip)
    {
        return '<div class="row cl"><label class="form-label col-xs-4 col-sm-2">' . $tip . '：</label><div class="formControls col-xs-8 col-sm-9">';
    }


    public function tag_end()
    {
        return '</div></div>';
    }

    public function content_format($data = null, $iscaache = false)
    {
        $modelinfo = $this->get_modelinfo();
        $string = false;
        if ($iscaache || empty($data)) {
//            $string = getcache($this->modelid . '_model_string');
        }
        if ($string === false) {
            $string = '';
            foreach ($modelinfo as $val) {
                $fieldtype = $val['fieldtype'];
                $field = $val['field'];
                $name = $val['name'];
                $tips = $val['tips'];
                $setting = $val['setting'];

                if (empty($data)) {
                    $defaultvalue = $val['defaultvalue'];
                } else {
                    $defaultvalue = $data[$field];

                }
                $errortips = !empty($val['errortips']) ? $val['errortips'] : '必填项不能为空';
                $required = $val['isrequired'] ? ' required" errortips="' . $errortips : '';

                switch ($fieldtype) {
//                    case "input":
//                    case "number":
//                        $string .= $this->tag_start($name) . '<input type="text" class="input-text' . $required . '" value="' . $defaultvalue . '" name="' . $field . '" placeholder="' . $tips . '">' . $this->tag_end();
//                        break;
//                    case "textarea":
//                        $string .= $this->tag_start($name) . '<textarea name="' . $field . '" class="textarea' . $required . '"  placeholder="' . $tips . '" >' . $defaultvalue . '</textarea>' . $this->tag_end();
//                        break;
//                    case "select":
//                        $string .= $this->tag_start($name) . '<span class="select-box">' . form::select($field, '', string2array($setting)) . '</span>' . $this->tag_end();
//                        break;
//                    case "checkbox":
//                        $string .= $this->tag_start($name) . '<span class="checkbox-box">' . form::checkbox($field, '', string2array($setting)) . '</span>' . $this->tag_end();
//                        break;
//                    case "radio":
//                        $string .= $this->tag_start($name) . form::$fieldtype($field, $defaultvalue, string2array($setting)) . $this->tag_end();
//                        break;
//                    case "datetime":
//                        $string .= $this->tag_start($name) . form::datetime($field, '', $setting) . $this->tag_end();
//                        break;
                    default:
                        $string .= $this->tag_start($name) . forms::other($fieldtype,$defaultvalue,$val) . $this->tag_end();
                        break;

                }
            }

            if ($iscaache || empty($data)) {
                setcache($this->modelid . '_model_string', $string);
            }
        }
        return $string;
    }

    public function content_add()
    {
        return $this->content_format();
    }

    public function content_edit($data)
    {
        return $this->content_format($data);
    }


    public function get_modelinfo()
    {
        $modelinfo = getcache($this->modelid . '_modelinfo');
        $modelinfo=false;
        if ($modelinfo === false) {
            if (!D('model')->where(array('modelid' => $this->modelid))->find()) showmsg('模型不存在！');
            $modelinfo = D('model_field')->where(array('modelid' => 0, 'disabled' => 0), array('modelid' => $this->modelid, 'disabled' => 0))->order('modelid asc,listorder ASC')->select();
            setcache($this->modelid . '_modelinfo', $modelinfo);
            delcache($this->modelid . '_model_string');
        }
        return $modelinfo;
    }
    public function get_model()
    {
        $model = getcache($this->modelid . '_model');
        $model=false;
        if ($model === false) {
            $model=D('model')->where( array('modelid' => $this->modelid))->find();
            setcache($this->modelid . '_model', $model);
        }
        return $model;
    }
}
