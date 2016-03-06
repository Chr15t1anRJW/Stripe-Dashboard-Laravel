<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model {

	// mass asignable feilds
	protected $fillable = [
	'title',
	'description',
	'api_key'
	
	
	];
	
	
	
	//Calculates gross total
	public static function calcGross($chargeData){
		$total = 0;
		foreach ($chargeData as $charge){
			if($charge['status'] ==='failed' or $charge['refunded'] ===1){
				continue;
				}
			$amount = $charge['amount'];
			$total = $total+$amount;
			}
		
		return $total;
	}
		//Calculates fees for period
    public static function calcFees($chargeData){
		$total = 0;
		foreach ($chargeData as $charge){
			if($charge['status'] ==='failed' or $charge['refunded'] ===1){
				continue;
				}
			$amount = $charge['amount'];
			
			$fee = (($amount*.029)+30);
			$fee = round($fee);
			$total = $total+$fee;
			}
		return $total; 
	}	



		//Calculates refunds
    public static function calcRefunds($chargeData){
		$total = 0;
		foreach ($chargeData as $charge){
			if(!$charge['refunded'] === 1){
				continue;
				}
			$refundAmount = $charge['amount_refunded'];
				
				$total = $total+$refundAmount;
			}
		return $total;
	
	}

		//Main function for grabbing data
		public static function getpropdata($start,$finish,$apikey){
				//Set key
			\Stripe\Stripe::setApiKey($apikey);
			$allCharges = \Stripe\Charge::all(array('created[gte]'=> $start,'created[lt]'=> $finish,'limit'=>1000));
			$chargeData = $allCharges['data'];
			$gross = Property::calcGross($chargeData);
			$fees = Property::calcFees($chargeData);
			$refunds = Property::calcRefunds($chargeData);
			
			$results = array($gross,$fees,$refunds);
			
			return $results;
     	}


		//Gets all transphers
		public static function gettransdata($start,$finish,$apikey){
				\Stripe\Stripe::setApiKey($apikey);
			$allTransfers = \Stripe\Transfer::all(array('created[gte]'=> $start,'created[lt]'=> $finish,'limit'=>1000));
			$allTransfers = $allTransfers['data'];
				$total = 0;
			
				foreach ($allTransfers as $transfer){
					/*if($transfer['status'] ==='failed'){
						continue;
						}*/
				
					$amount = $transfer['amount'];
					
					$total = $total+$amount;
					}
				return $total; 
			
			}
		
			//assigns Property to a user
	public static function user(){
		
			return $this->belongsTo('App\User');
		
		
		}
		//assigns Property tags
	
	public function tags(){
		
			return $this->belongsToMany('App\Tag');
		
		
		}
	
	
	
	

}


