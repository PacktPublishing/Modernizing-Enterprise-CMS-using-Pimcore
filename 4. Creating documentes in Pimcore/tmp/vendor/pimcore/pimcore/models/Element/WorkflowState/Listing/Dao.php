<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @category   Pimcore
 * @package    Element
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\Element\WorkflowState\Listing;

use Pimcore\Model;

/**
 * @property \Pimcore\Model\Element\WorkflowState\Listing $model
 */
class Dao extends Model\Listing\Dao\AbstractDao
{
    /**
     * Loads a list of workflow states for the specified parameters, returns an array of Element\WorkflowState elements
     *
     * @return array
     */
    public function load()
    {
        $workflowStateData = $this->db->fetchAll('SELECT cid, ctype, workflow FROM element_workflow_state' . $this->getCondition() . $this->getOrder() . $this->getOffsetLimit(), $this->model->getConditionVariables());

        $workflowStates = [];
        foreach ($workflowStateData as $entry) {
            if ($workflowState = Model\Element\WorkflowState::getByPrimary($entry['cid'], $entry['ctype'], $entry['workflow'])) {
                $workflowStates[] = $workflowState;
            }
        }

        $this->model->setWorkflowStates($workflowStates);

        return $workflowStates;
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        try {
            return (int) $this->db->fetchOne('SELECT COUNT(*) FROM element_workflow_state ' . $this->getCondition(), $this->model->getConditionVariables());
        } catch (\Exception $e) {
            return 0;
        }
    }
}
