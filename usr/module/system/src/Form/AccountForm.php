<?php
/**
 * Pi Engine (http://pialog.org)
 *
 * @link            http://code.pialog.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://pialog.org
 * @license         http://pialog.org/license.txt New BSD License
 */

namespace Module\System\Form;

use Pi;
use Pi\Form\Form as BaseForm;
use Pi\Application\Db\User\RowGateway\Account;

/**
 * Account form
 *
 * @author Taiwen Jiang <taiwenjiang@tsinghua.org.cn>
 */
class AccountForm extends BaseForm
{
    /** @var Account User account model */
    protected $user;

    /**
     * Constructor
     *
     * @param null|string|int $name Optional name for the element
     * @param Account $user User account row
     */
    public function __construct($name = null, $user = null)
    {
        $this->user = $user;
        parent::__construct($name);
    }

    /**
     * Initialization
     */
    public function init()
    {
        $this->add(array(
            'name'          => 'identity',
            'options'       => array(
                'label' => __('User account'),
            ),
            'attributes'    => array(
                'type'  => 'text',
                'value' => $this->user->identity,
            ),
        ));

        $this->add(array(
            'name'          => 'name',
            'options'       => array(
                'label' => __('Display name'),
            ),
            'attributes'    => array(
                'type'  => 'text',
                'value' => $this->user->name,
            ),
        ));

        $this->add(array(
            'name'  => 'security',
            'type'  => 'csrf',
        ));

        $this->add(array(
            'name'  => 'id',
            'attributes'    => array(
                'type'  => 'hidden',
                'value' => $this->user->id,
            ),
        ));

        $this->add(array(
            'name'          => 'submit',
            'type'          => 'submit',
            'attributes'    => array(
                'value' => __('Submit'),
            ),
        ));
    }
}
