<?php namespace Hounddd\TestBatches\Controllers;

use Backend;

use BackendMenu;
use Backend\Classes\Controller;
use Hounddd\TestBatches\Jobs\FakeJob;
use Illuminate\Support\Facades\Bus;

/**
 * Jobs Backend Controller
 */
class Jobs extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    // public $implement = [
    //     \Backend\Behaviors\FormController::class,
    //     \Backend\Behaviors\ListController::class,
    // ];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Hounddd.TestBatches', 'testbatches', 'jobs');
    }

    /**
     * Index Controller action.
     * @return void
     */
    public function index()
    {
        // $this->controller->pageTitle = $this->controller->pageTitle ?: Lang::get($this->getConfig(
        //     'title',
        //     'backend::lang.list.default_title'
        // ));
        // $this->controller->bodyClass = 'slim-container';
        // $this->makeLists();

            dd($this->params);

        if (true) {

            $jobs = [];

            for ($i=0; $i < 1000; $i++) {
                $jobs[] = new FakeJob();
            }

            $batch = Bus::batch($jobs)->dispatch();

            return redirect(Backend::url('hounddd/testbatches/jobs?batch_id=' . $batch->id));
        }



    }
}
