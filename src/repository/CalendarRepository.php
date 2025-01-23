<?php
require_once '/home/api-magasinconnecte/www/src/models/Calendar.php';
require_once '/home/api-magasinconnecte/www/src/connector/JsonConnector.php';

class CalendarRepository {
    private $connector;

    public function __construct() {
        $this->connector = new JsonConnector('/home/api-magasinconnecte/www/src/data/calendar.json');
    }

    public function getCalendar() {
        return $this->connector->read();
    }

    public function getYear($year) {
        $calendar = $this->getCalendar();
        if ($calendar['year'] == $year) {
            return [
                'year' => $calendar['year'],
                'weeks' => $calendar['weeks']
            ];
        }
        return null;
    }

    public function getWeek($year, $week) {
        $calendar = $this->getYear($year);
        foreach ($calendar['weeks'] as $w) {
            if ($w['number'] == $week) {
                return $w;
            }
        }
        return null;
    }

    public function addYear($year): void {
        $calendar = $this->getCalendar();
        $calendar[] = $year;
        $this->connector->write($calendar);
    }

    public function addWeek($year, $week): void {
        $calendar = $this->getCalendar();
        foreach ($calendar as &$c) {
            if ($c['year'] == $year) {
                $c['weeks'][] = $week;
            }
        }
        $this->connector->write($calendar);
    }

    public function alreadyExistYear($year){
        return $this->getYear($year) != null;
    }

    public function updateWeek($year, $week){
        $calendar = $this->getCalendar();
        foreach ($calendar as &$c) {
            if ($c['year'] == $year) {
                foreach ($c['weeks'] as &$w) {
                    if ($w['number'] == $week['number']) {
                        $w = $week;
                    }
                }
            }
        }
        $this->connector->write($calendar);
    }

    public function deleteYear($year){
        $calendar = $this->getCalendar();
        foreach ($calendar as $key => $c) {
            if ($c['year'] == $year) {
                unset($calendar[$key]);
            }
        }
        $this->connector->write($calendar);
    }

    public function deleteWeek($year, $week){
        $calendar = $this->getCalendar();
        foreach ($calendar as &$c) {
            if ($c['year'] == $year) {
                foreach ($c['weeks'] as $key => $w) {
                    if ($w['number'] == $week) {
                        unset($c['weeks'][$key]);
                    }
                }
            }
        }
        $this->connector->write($calendar);
    }
}
?>