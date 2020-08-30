<?php

    function getDateAsDateTime($date) {
        return is_string($date) ? new DateTime($date) : $date;
    }

    function isWeekend($date) {
        $inputDate = getDateAsDateTime($date);
        return $inputDate->format('N') >= 6;
    }

    function isBefore($date1, $date2) {
        $inputDate1 = getDateAsDateTime($date1);
        $inputDate2 = getDateAsDateTime($date2);
        return $inputDate1 <= $inputDate2;
    }

    function getNextDay($date) {
        $inputDate = getDateAsDateTime($date);
        $inputDate->modify('+1 day');
        return $inputDate;
    }

    function sumIntervals($interval1, $interval2) {
        $date = new DateTime('00:00:00');
        $date->add($interval1);
        $date->add($interval2);
        return (new DateTime('00:00:00'))->diff($date);
    }

    function subtractIntervals($interval1, $interval2) {
        $date = new DateTime('00:00:00');
        $date->add($interval1);
        $date->sub($interval2);
        return (new DateTime('00:00:00'))->diff($date);
    }

    function getDateFromInterval($interval) {
        return new DateTimeImmutable($interval->format('%H:%i:%s'));
    }

    function getDateFromString($str) {
        return DateTimeImmutable::createFromFormat('H:i:s', $str);
    }

    function getFirstDayOfMonth($date) {
        $time = getDateAsDateTime($date)->getTimestamp();
        return new DateTime(date('Y-m-1', $time));
    }

    function getLastDayOfMonth($date) {
        $time = getDateAsDateTime($date)->getTimestamp();
        return new DateTime(date('Y-m-t', $time));
    }

    function getSecondsFromDateInterval($interval) {
        $d1 = new DateTimeImmutable();
        $d2 = $d1->add($interval);
        return $d2->getTimestamp() - $d1->getTimestamp();
    }

    function isPastWorkday($date) {
        return !isWeekend($date) && isBefore($date, new DateTime());
    }

    function getTimeStringFromSeconds($seconds) {
        $h = intdiv($seconds, 3600);
        $m = intdiv($seconds % 3600, 60);
        $s = $seconds - ($h * 3600) - ($m * 60);
        return sprintf('%02d:%02d:%02d', $h, $m, $s);
    }

    function formatDateWithLocale($date, $pattern) {
        $time = getDateAsDateTime($date)->getTimestamp();
        return strftime($pattern, $time);
    }

    function getIdade($dataNasc){
        // formato da data de nascimento yyyy-mm-dd
        $data       = explode("-",$dataNasc);
        $anoNasc    = $data[0];
        $mesNasc    = $data[1];
        $diaNasc    = $data[2];
     
        $anoAtual   = date("Y");
        $mesAtual   = date("m");
        $diaAtual   = date("d");
     
        $idade = $anoAtual - $anoNasc;
     
        if($mesAtual < $mesNasc){
            $idade -= 1;
            return $idade;
        }elseif( ($mesAtual == $mesNasc) && ($diaAtual <= $diaNasc) ){
            $idade -= 1;
            return $idade;
        }else{
            return $idade;
        }
    }

    function translateDate(){
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        return ucfirst(utf8_encode(strftime("%d de %B de %Y", time())));
    }