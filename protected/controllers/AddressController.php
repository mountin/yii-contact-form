<?php

class AddressController extends Controller
{
	public function actionAdd()
	{
        $model = new Address();

        if(!empty($_POST['Address'])){
            $data = $_POST['Address'];


            $model->address1 = $data['address1'];
            $model->address2 = $data['address2'];
            $model->state = $data['state'];
            $model->zip = $data['zip'];
            $model->city = $data['city'];
            $model->extrafield = $data['extrafield'];
            $model->email = $data['email'];
            $model->phone = $data['phone'];
            $model->url = $data['url'];


            if($model->validate()){
                if(!empty($_GET['saveData'])){
                    //echo 'saveDAta!!!!';
                    $model->save();
                }


                echo CJSON::encode(array(
                    'status'=>'success'
                ));


            }else{
                echo json_encode($model->getErrors());
            }
            Yii::app()->end();
        }

		$this->render('add', [
            'model' => $model,
        ]);
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionShow()
	{
		$this->render('show');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}