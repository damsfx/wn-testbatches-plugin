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
            'failed_jobs' => 'Failed jobs',
            'pending_jobs' => 'Pending jobs',
            'progress' => 'Progress',
            'total_jobs' => 'Total jobs',
        ],
    ],
    'controllers' => [
        'batches' =>  [
            'create_batches' => 'Create batches',
            'create_batches_header' => 'Going to create some fake batches. Please indicate the number of batches to create. <br /><b>Each batch wil have 100 pending jobs.</b>',
        ],
    ],
];
