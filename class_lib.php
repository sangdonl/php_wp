<?php

	class EventItem {
		private $eventName;
		private $eventDate;
		private $eventDesc;
		private $eventPrice;
		
		function __construct($eventName, $eventDate, $eventDesc, $eventPrice) {
				$this->setEventName($eventName);
				$this->setEventDate($eventDate);
				$this->setEventDesc($eventDesc);
				$this->setEventPrice($eventPrice);
		}
		
		public function getEventName() {
			return $this->eventName;
		}
		
		public function setEventName($eventName) {
			$this->eventName = $eventName;
		}
		
		public function getEventDate() {
			return date("l F j, Y", strtotime($this->eventDate));
		}
		
		public function getEventTime() {
			return date("g a", strtotime($this->eventDate));
		}
		
		public function setEventDate($eventDate) {
			$this->eventDate = $eventDate;
		}
		
		public function getEventDesc() {
			return $this->eventDesc;
		}
		
		public function setEventDesc($eventDesc) {
			$this->eventDesc = $eventDesc;
		}
				
		public function getEventPrice() {
			return "$" . number_format($this->eventPrice, 2);
		}
		
		public function setEventPrice($eventPrice) {
			$this->eventPrice = $eventPrice;
		}
	}
?>