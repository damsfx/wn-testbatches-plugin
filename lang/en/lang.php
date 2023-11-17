<?php

return [
    'plugin' => [
        'name' => 'TestBatches',
        'description' => 'No description provided yet...',
    ],
    'permissions' => [
        'some_permission' => 'Some permission',
    ],
    'models' => [
        'job' => [
            'label' => 'Job',
            'label_plural' => 'Jobs',
        ],
        'general' => [
            'id' => 'ID',
            'name' => 'Name',
            'cancelled_at' => 'Canceled At',
            'created_at' => 'Created At',
            'finished_at' => 'Finished At',
            'updated_at' => 'Updated At',
        ],
        'batch' => [
            'label' => 'Batch',
            'label_plural' => 'Batches',
            'actions' => 'Actions',
            'failed_jobs' => 'Failed jobs',
            'pending_jobs' => 'Pending jobs',
            'progress' => 'Progress',
            'total_jobs' => 'Total jobs',
        ],
    ],
    'controllers' => [
        'general' =>  [
            'cancel' => 'Cancel',
            'cancel_selected' => 'Cancel selected',
            'cancel_selected_confirm' => 'Cancel the selected batches',
            'details' => 'Details',
            'prune' => 'Prune Batches',
            'refresh' => 'Refresh list',
        ],
        'batches' =>  [
            'create_batches_header' => 'Going to create some fake batches. Please indicate the number of batches to '
               .'create. <br /><b>Each batch wil have 100 pending jobs.</b>',
            'create_batches_title' => 'Create batches',
            'hide_completed' => 'Hide completed jobs',
            'pruning_delay' => 'The number of hours to retain batch data',
            'pruning_header' => 'The <code>job_batches</code> table can accumulate records very quickly, so prune it to make it '
               .'lighter. <br /><b>All finished batches that are more than this number of hours old will be pruned.</b>',
            'pruning_title' => 'Pruning batches',
        ],
        'infos' => [
            'title' => 'Batch infos'
        ]
    ],
];
