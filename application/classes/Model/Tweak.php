<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Some tweaks
 * @author  Alexander Demyashev <daseemux@gmail.com>
 * @license OpenSource
 */

class Model_Tweak extends Model
{
    /**
     * Returns the elapsed time from a certain point
     *
     * @author  Petr Savchenko
     * @param   string  $timestamp
     * @param   string  $date
     * @return  string
     */
    public function ftime($timestamp, $long = false)
    {
        $time = time() - $timestamp;

        if ( $time < Date::DAY ) {
            return 'сегодня в ' . date('H:i', $timestamp);
        } elseif ( $time < Date::DAY*2 ) {
            return 'вчера в ' . date('H:i', $timestamp);
        } elseif( $long ) { // если нужна полная дата
            return $this->rusDate("j F Y в H:i", $timestamp);
        } elseif ( $time > Date::MONTH && $time < Date::YEAR ) {
            return round($time / Date::MONTH) . ' ' . self::num_decline(round($time / Date::MONTH), 'месяц','месяца','месяцев') .  ' назад';
        } elseif ( $time > Date::YEAR ) {
            return $this->rusDate("j F Y", $timestamp);
        } else {
            return round($time / Date::DAY) . ' ' . self::num_decline(round($time / Date::DAY), 'день','дня','дней') .' назад';
        }
    }

    /**
     * Converts a date with En to Ru
     *
     * @author  Petr Savchenko
     * @param   string  $timestamp
     * @param   string  $date
     * @return  string
     */
    public function rusDate()
    {
        $translate = array(
            "am" => "дп",
            "pm" => "пп",
            "AM" => "ДП",
            "PM" => "ПП",
            "Monday" => "Понедельник",
            "Mon" => "Пн",
            "Tuesday" => "Вторник",
            "Tue" => "Вт",
            "Wednesday" => "Среда",
            "Wed" => "Ср",
            "Thursday" => "Четверг",
            "Thu" => "Чт",
            "Friday" => "Пятница",
            "Fri" => "Пт",
            "Saturday" => "Суббота",
            "Sat" => "Сб",
            "Sunday" => "Воскресенье",
            "Sun" => "Вс",
            "January" => "Января",
            "Jan" => "янв",
            "February" => "Февраля",
            "Feb" => "фев",
            "March" => "Марта",
            "Mar" => "мар",
            "April" => "Апреля",
            "Apr" => "апр",
            "May" => "Мая",
            "May" => "мая",
            "June" => "Июня",
            "Jun" => "июн",
            "July" => "Июля",
            "Jul" => "июл",
            "August" => "Августа",
            "Aug" => "авг",
            "September" => "Сентября",
            "Sep" => "сен",
            "October" => "Октября",
            "Oct" => "окт",
            "November" => "Ноября",
            "Nov" => "ноя",
            "December" => "Декабря",
            "Dec" => "дек",
            "st" => "ое",
            "nd" => "ое",
            "rd" => "е",
            "th" => "ое"
        );

        if (func_num_args() > 1) {
            $timestamp = func_get_arg(1);
            return strtr(date(func_get_arg(0), $timestamp), $translate);
        } else {
            return strtr(date(func_get_arg(0)), $translate);
        }
    }

    /**
     * Determining date ending
     * Used for method ftime()
     *
     * @author  Petr Savchenko
     * @param   integer $num
     * @param   string  $nominative
     * @param   string  $genitive_singular
     * @param   tring   $genitive_plural
     */
    public function num_decline($num, $nominative, $genitive_singular, $genitive_plural)
    {
        if($num > 10 && ( floor(($num % 100) / 10) )  == 1){
                return $genitive_plural;
        } else {
            switch($num % 10){
                case 1: return $nominative;
                case 2: case 3: case 4: return $genitive_singular;
                case 5: case 6: case 7: case 8: case 9: case 0: return $genitive_plural;
            }
        }
    }
}