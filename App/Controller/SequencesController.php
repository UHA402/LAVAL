<?php
use App\Core\Controller\Controller;
use App\Core\View\View;
use App\Core\Request\Request;
use App\Core\Validator;

class SequencesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Sequence_Brick');
    }

    /**
     * Create (if !$id) or edit (if $id) a sequence with it bricklist
     * @param  int $id [sequence id]
     */
    public function edit($id = null)
    {
      if (isset($_SESSION['user']) && $_SESSION['user']['role'] == "admin") { // If the user is admin
        /**
         * Get the $_SESSION bricks and save them in the $_POST
         */
        // if (isset($_SESSION['sequence_bricks_id'])) {
        //   $_POST['sequence_bricks_id'] = $_SESSION['sequence_bricks_id'];
        // }

        /**
         * If $id, go for an edit
         */
        if ($id) {
            if (Request::cleanInput($this->Sequence->findById($id))) { // If i find a sequence which has the id
                if ($_POST && !Validator::array_has_empty($_POST)) {
                    $sequence_bricks = Request::cleanInput($this->Sequence_Brick->findBySeqId($id));

                    // Create the string to save in the sequences_bricks table
                    $length = count($_POST['sequence_bricks_id']);
                    $bricks_id = '';
                    $i=0;
                    foreach ($_POST['sequence_bricks_id'] as $key => $brick_id) {
                        if ($i == ($length-1)) {
                            $bricks_id .= $brick_id;
                        } else {
                            $bricks_id .= $brick_id.',';
                        }
                        $i++;
                    }
                    $this->Sequence_Brick->edit($sequence_bricks['id'], $sequence_bricks['sequence_id'], $bricks_id);
                    $this->Sequence->update($id, $_POST['sequence']);
                    $this->setFlash('The sequence has been succesfully updated', 'success');
                }
                $sequence = Request::cleanInput($this->Sequence->findById($id));
                $sequence_bricks = Request::cleanInput($this->Sequence_Brick->findBySeqId($id));
                $bricksId = explode(',', $sequence_bricks['bricks_id']);
                $this->view->sequence = $sequence;
                $this->view->sequence_bricks = $bricksId;
            } else { // If there is no sequence matching with the id
                $this->setFlash("This sequence doesn't exist", 'warning');
            }
            /**
             * If not $id, go for a creation
             */
        } elseif (isset($_POST['sequence']) && isset($_POST['sequence_bricks_id'])) {
            //Create the sequence in the sequences table
            $this->Sequence->create($_POST['sequence']);

            // Create the string to save in the sequences_bricks table
            $length = count($_POST['sequence_bricks_id']);
            $bricks_id = '';
            $i=0;
            foreach ($_POST['sequence_bricks_id'] as $key => $id) {
                if ($i == ($length-1)) {
                    $bricks_id .= $id;
                } else {
                    $bricks_id .= $id.',';
                }
                $i++;
            }
            $sequence_id = $this->Sequence->findLastId();
            $this->Sequence_Brick->save($sequence_id, $bricks_id);
            $this->setFlash("You've created a new sequence ! Congrats !", 'success');
        }

        // Create vars to send to the view
        $bricks = $this->Sequence->findAllBricks();
        $sequences = $this->Sequence->findAll();

        $this->view->bricks = $bricks;
        $this->view->sequences = $sequences;

        $this->view->render('sequences/edit');
      } else {
        $this->setFlash('You need to be logged in as an administrator to create or edit sequences', "warning");
        $this->view->redirect_to('');
      }
    }

    /**
     * Add the bricklist in Session
     */
    // public function addBricks(){
    //   $_SESSION['sequence_bricks_id'] = $_POST['sequence_bricks_id'];
    //
    //   // create and send vars to the view
    //   $sequence_bricks = $_POST['sequence_bricks_id'];
    //   $bricks = $this->Sequence->findAllBricks();
    //
    //   $this->view->sequence_bricks = $sequence_bricks;
    //   $this->view->bricks = $bricks;
    //
    //   $this->view->render('sequences/edit');
    //   $this->view->redirect_to('sequence/edit');
    //
    // }

    /*
     * Sequences display
     */
    public function index()
    {
        $sequences = $this->Sequence->findAll();
        $this->view->sequences = $sequences;
        $this->view->render('sequences/index');
    }

    /*
    * Sequence single view
    */
    public function view()
    {
        $this->view->render('sequences/view');
        $this->view->redirect_to('sequences/view');
    }

    /*
    * Sequence delete
    */
    public function delete($id, $confirm = null)
    {
        if ($id) {
            if ($sequence = $this->Sequence->findById($id)) {
                if ($confirm && isset($_SESSION['token']) && $confirm == $_SESSION['token']) {
                    $this->Sequence->delete($id);
                    $this->Sequence_Brick->delete($id);
                    unset($_SESSION['token']);
                    $this->setFlash('The sequence has been deleted', 'success');
                    $this->view->redirect_to('/sequence/edit');
                } else {
                    $token = md5(rand());
                    $_SESSION['token'] = $token;
                    $this->view->sequence = $sequence;
                    $this->view->token = $token;
                    $this->view->brick_id = $id;
                    $this->view->render('sequences/delete');
                }
            }
        } else {
            $this->setFlash('You cannot delete a sequence without its id');
        }
    }
}
