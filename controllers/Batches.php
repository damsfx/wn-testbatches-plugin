<?php namespace Hounddd\TestBatches\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Hounddd\TestBatches\Jobs\FakeJob;
use Illuminate\Support\Facades\Bus;

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

    public function index()
    {
        //
        // Do any custom code here
        //
        // $this->addJs('$/hounddd/testbatches/assets/js/winter.bus.js', 'Hounddd.TestBatches');

        // Call the ListController behavior index() method
        $this->asExtension('ListController')->index();
    }

    public function index_onRefresh()
    {
        return $this->listRefresh();
    }


    public function index_onAskCreateFake()
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

        $this->vars['createBatchesFormWidget'] = $createBatchesFormWidget;

        return $this->makePartial('$/hounddd/testbatches/controllers/batches/_create_batches.htm');
    }

    public function onCreateBatches()
    {
        $nbBatches = post('Batch.nb_batches');

        for ($n=1; $n <= $nbBatches; $n++) {
            $jobs = [];
            for ($i=0; $i < 100; $i++) {
                $jobs[] = new FakeJob();
            }

            $batch = Bus::batch($jobs)->dispatch();
        }

        return $this->listRefresh();
    }
}
