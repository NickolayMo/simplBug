<?php

namespace App\Repositories;

use App\Models\Issue;

class IssueRepository {

    public function getOrderedIssues($issue, $column, $order) {
        return $issue->orderBy('issues.' . $column, $order);
    }

    public function getSearchForIssue($issue, $query) {
        return $issue->whereRaw("(LOWER(issues.title) LIKE '%" . strtolower($query) . "%')");
    }

    public function getFilteredIssues($issue, $filters) {
        //filter only by this restrictions
        $restrictions = [
            'severity_id',
            'status_id'
        ];
        $result = [];
        foreach ($restrictions as $restriction) {
            if (isset($filters[$restriction])) {
                $result[$restriction] = $filters[$restriction];
            }
        }
        if (empty($result)) {
            return $issue;
        }
        foreach ($result as $col => $elem) {
            $issue->whereIn($col, $elem);
        }
        return $issue;
    }

    /**
     * New issue counter for main page
     * @param type $issue
     * @param type $projectId
     * @param type $assingned
     * @return type
     */
    public function newIssuesCount($issue, $projectId, $assingned) {
        $issues = $issue->select(\DB::raw('count(*) as aggregate'))->where('status_id', '=', 0);
        if (!empty($projectId)) {
            $issues->where('issues.project_id', '=', $projectId);
        }
        if (!empty($assingned)) {
            $issues->where('issue.responsible_id', '=', $assingned);
        }

        return $issues->first()->aggregate;
    }

    /**
     * Test issue counter for main page
     * @param type $issue
     * @param type $projectId
     * @param type $assingned
     * @return type
     */
    public function testIssuesCount($issue, $projectId, $assingned) {
        $issues = $issue->select(\DB::raw('count(*) as aggregate , statuses.id as id'))
                ->leftJoin('statuses', 'statuses.id', '=', 'issues.status_id')
                ->where('statuses.title', '=', 'test');
        if (!empty($projectId)) {
            $issues->where('issues.project_id', '=', $projectId);
        }
        if (!empty($assingned)) {
            $issues->where('issue.responsible_id', '=', $assingned);
        }
        return $issues->first();
    }

    /**
     * In progress issue counter for main page
     * @param type $issue
     * @param type $projectId
     * @param type $assingned
     * @return type
     */
    public function inProgressIssuesCount($issue, $projectId, $assingned) {
        $issues = $issue->select(\DB::raw('count(*) as aggregate, statuses.id as id'))
                ->leftJoin('statuses', 'statuses.id', '=', 'issues.status_id')
                ->where('statuses.title', '=', 'in progress');
        if (!empty($projectId)) {
            $issues->where('issues.project_id', '=', $projectId);
        }
        if (!empty($assingned)) {
            $issues->where('issue.responsible_id', '=', $assingned);
        }
        return $issues->first();
    }

     /**
     * Release issue counter for main page
     * @param type $issue
     * @param type $projectId
     * @param type $assingned
     * @return type
     */
    public function releaseIssuesCount($issue, $projectId, $assingned) {
        $issues = $issue->select(\DB::raw('count(*) as aggregate , statuses.id as id'))
                ->leftJoin('statuses', 'statuses.id', '=', 'issues.status_id')
                ->where('statuses.title', '=', 'Relise');
        if (!empty($projectId)) {
            $issues->where('issues.project_id', '=', $projectId);
        }
        if (!empty($assingned)) {
            $issues->where('issue.responsible_id', '=', $assingned);
        }
        return $issues->first();
    }

}
