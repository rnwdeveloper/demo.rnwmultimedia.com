<?php 


function logdata($c)
{
	
	if(count($this->cm->log_counter()) == 1)
		{
			
			$data = $this->cm->log_counter();
			$msg = $data->comment.','.date('d-m-Y H:i:s').'/'.$c;
			$up['comment']=$msg;
			$this->cm->update_data("logger",$up,"id",$data->id);
		}
		else
		{

				$this->logger->user($_SESSION['user_name'])->type($_SESSION['logtype'])->id($_SESSION['user_id'])->token('insert')->comment(date('d-m-Y H:i:s').'/'.$c)->log();
		}
}