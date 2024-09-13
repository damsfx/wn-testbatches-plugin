<?php

namespace Hounddd\TestBatches\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Hounddd\TestBatches\Jobs\FakeJob;
use Hounddd\TestBatches\Models\Batch;
use Illuminate\Bus\BatchRepository;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Bus;
use Lang;

/**
 * Batches Backend Controller
 */
class Batches extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Hounddd.TestBatches', 'testbatches', 'batches');

        $this->addJs('$/hounddd/testbatches/assets/js/winter.bus.js', 'core');
    }


    public function index_onRefresh()
    {
        return $this->listRefresh();
    }


    public function index_onCreateBatchesShowPopup()
    {
        $config = $this->makeConfig([
            'fields' => [
                'nb_batches' => [
                    'label' => 'Nb of batches to create',
                    'default' => 5,
                ],
            ],
        ]);

        $config->alias           = 'createBatchesForm';
        $config->arrayName       = 'Batch';
        $config->model           = new \Hounddd\TestBatches\Models\Batch();
        $createBatchesFormWidget = $this->makeFormWidget('Backend\Widgets\Form', $config);
        $createBatchesFormWidget->bindToController();

        // $this->initForm($config->model);
        $this->vars['createBatchesFormWidget'] = $createBatchesFormWidget;

        return $this->makePartial('$/hounddd/testbatches/controllers/batches/_create_batches.htm');
    }

    public function onCreateBatches()
    {
        $nbBatches = post('Batch.nb_batches');

        for ($n=1; $n <= $nbBatches; $n++) {
            $nbJobs = rand(50, 100);
            $jobs = [];

            for ($i=1; $i <= $nbJobs; $i++) {
                $jobs[] = new FakeJob();
            }

            $batch = Bus::batch($jobs)->name('Batch-'. date("Ymd-His"))->dispatch();
        }

        return $this->listRefresh();
    }


    public function index_onAskPruneDelayShowPopup()
    {
        $config = $this->makeConfig([
            'fields' => [
                'hours' => [
                    'label' => 'hounddd.testbatches::lang.controllers.batches.pruning_delay',
                    'type' => 'dropdown',
                    'options' => [
                        '0' => '0',
                        '1' => '1',
                        '12' => '12',
                        '24' => '24',
                        '48' => '48',
                        '72' => '72',
                    ],
                    'default' => '48',
                ],
            ],
        ]);

        $config->alias           = 'pruneDelayForm';
        $config->arrayName       = 'Batch';
        $config->model           = new \Hounddd\TestBatches\Models\Batch();
        $pruneDelayFormWidget = $this->makeFormWidget('Backend\Widgets\Form', $config);
        $pruneDelayFormWidget->bindToController();

        // $this->initForm($config->model);
        $this->vars['pruneDelayFormWidget'] = $pruneDelayFormWidget;

        return $this->makePartial('$/hounddd/testbatches/controllers/batches/_prune_delay.htm');
    }

    public function onPrune()
    {
        $hours = post('Batch.hours', 48);

        Artisan::call('queue:prune-batches', [
            '--hours' => $hours,
            '--cancelled' => 72,
        ]);

        return $this->listRefresh();
    }


    public function onCancel()
    {
        $batches = post('checked') ?? [post('batchId')];

        foreach ($batches as $batchId) {
            $batch = Bus::findBatch($batchId);
            $batch->cancel();
        }

        return $this->listRefresh();
    }


    public function onRetryFailedJobs()
    {
        $batchId = post('batchId');

        Artisan::call('queue:retry-batch '. $batchId);

        return $this->listRefresh();
    }


    public function infos($recordId = null)
    {
        $this->vars['batch'] = Batch::where('id', $recordId)->firstOrFail();

        $this->pageTitle = Lang::get('hounddd.testbatches::lang.controllers.infos.title');
    }
}
