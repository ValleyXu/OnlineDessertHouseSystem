<?php

/**
 * This is the model class for table "goods".
 *
 * The followings are the available columns in table 'goods':
 * @property integer $gid
 * @property string $gname
 * @property string $ginfo
 * @property string $gimg
 * @property integer $gprice
 * @property integer $gaccess
 * @property integer $gkind
 *
 * The followings are the available model relations:
 * @property Sale[] $sales
 */
class Goods extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Goods the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'goods';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gname, gprice, gkind', 'required'),
			array('gid, gprice, gaccess, gkind', 'numerical', 'integerOnly'=>true),
			array('gname', 'length', 'max'=>59),
			array('ginfo', 'length', 'max'=>100),
			array('gimg', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('gid, gname, ginfo, gimg, gpic, gprice, gaccess, gkind', 'safe', 'on'=>'search'),
			array('gname', 'unique', 'insert'),
		);
	}
//name must be unique except herself
	public function unique($attribute,$params)
	{	
	
			$record = Goods::model()->findByAttributes(array("gname"=>$this->gname));
			if($record != null) {
				$this->addError('gname','The name is occupied, please change one.');
			}
		
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'gpic0' => array(self::BELONGS_TO, 'Goodspic', 'gpic'),
			'sales' => array(self::HAS_MANY, 'Sale', 'sgid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'gid' => 'Gid',
			'gname' => 'Goods Name',
			'ginfo' => 'Goods Information',
			'gimg' => 'Goods Image',
			'gpic' => 'Gpic',
			'gprice' => 'Goods Price',
			'gaccess' => 'Goods Accessible Number',
			'gkind' => 'Goods Kind',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('gid',$this->gid);
		$criteria->compare('gname',$this->gname,true);
		$criteria->compare('ginfo',$this->ginfo,true);
		$criteria->compare('gimg',$this->gimg,true);
		$criteria->compare('gpic',$this->gpic);
		$criteria->compare('gprice',$this->gprice);
		$criteria->compare('gaccess',$this->gaccess);
		$criteria->compare('gkind',$this->gkind);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getImgUrl() {
		return '/valley/images/goods/' . $this->gimg;
	}

	private function saveFile() {
		$name = "";
		if ((($_FILES["gimgFile"]["type"] == "image/gif")
		|| ($_FILES["gimgFile"]["type"] == "image/jpeg")
		|| ($_FILES["gimgFile"]["type"] == "image/png")
		|| ($_FILES["gimgFile"]["type"] == "image/pjpeg"))
		&& ($_FILES["gimgFile"]["size"] < 200000))
		  {
		  if ($_FILES["gimgFile"]["error"] > 0)
		    {
		    echo "Return Code: " . $_FILES["gimgFile"]["error"] . "<br />";
		    }
		  else
		    {
		       $type = substr($_FILES['gimgFile']['type'], strpos($_FILES['gimgFile']['type'], '/') + 1);
		       $name = $this->genRandomString(40) . '.' . $type;
		       move_uploaded_file($_FILES["gimgFile"]["tmp_name"],
		       "images/goods/" . $name);
		    }
		  }
		  return $name;
		}

	public function dsAdminDel($nameDel){
		$model=Goods::model()->findByAttributes(array("gname"=>$nameDel));
		if($model==null){
			echo "<p style='color:#EA0000' class='msg'>No Such Goods!</p>";
		}
		else{
			if($model->delete()){
				echo "<p style='color:#EA0000' class='msg'>Delete Suscessfully!</p>";
			}else{
				echo var_dump($model);
				die();
			}
		}
	}
	public function dsAdminAdd(){
		$good=new Goods;
		$good->attributes=$this->attributes;
		$good->gimg=$this->saveFile();
		if($good->save())
		{
			return true;
		}
		else
		{
			echo var_dump($good);
			die();
		}
	}
	
	private function genRandomString($len)
	{
	    $chars = array(
	        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
	        "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
	        "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
	        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
	        "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",
	        "3", "4", "5", "6", "7", "8", "9"
	    );
	    $charsLen = count($chars) - 1;
	 
	    shuffle($chars);    // 将数组打乱
	 
	    $output = "";
	    for ($i=0; $i<$len; $i++)
	    {
	        $output .= $chars[mt_rand(0, $charsLen)];
	    }
	 
	    return $output;
	 
	}
	

	public function dsAdminShow(){
		$good = Goods::model()->findByPK($this->gid);
		$good->attributes=$this->attributes;
		$good->gimg=$this->saveFile();
		if($good->update()) {
			
			return true;
		}
		else
		{
			echo var_dump($this);
			die();
		}
		
	}
	//ending

}