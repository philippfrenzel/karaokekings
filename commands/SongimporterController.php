<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use frenzelgmbh\appcommon\components\CsvImporter;
use app\models\Songs;
use yii\helpers\Html;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SongimporterController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex()
    {
        $importer = new CsvImporter(dirname(__DIR__).'/import/karafuncatalog.csv',true,";",0);
		$data = $importer->get(0);
		foreach($data AS $song)
		{
			$ARSong = new Songs();
			$ARSong->title = Html::encode($song['Title']);
			$ARSong->artist = Html::encode($song['Artist']);
			$ARSong->year = $song['Year'];
			$ARSong->duo = $song['Duo'];
			$ARSong->save();

			unset($ARSong);
		}
		echo "All Records from the Songlist have been imported";
    }

    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionKaraokeclub()
    {
        $importer = new CsvImporter(dirname(__DIR__).'/import/neue_karaokeliste.csv',true,";",0);
		$data = $importer->get(0);
		foreach($data AS $song)
		{
			$ARSong = new Songs();
			$ARSong->title = Html::encode($song['Title']);
			$ARSong->artist = Html::encode($song['Artist']);
			//$ARSong->year = $song['Year'];
			//$ARSong->duo = $song['Duo'];
			$ARSong->save();

			unset($ARSong);
		}
		echo "All Records from the KaraokeClub (http://www.karaokeclub.at) have been imported";
    }
}
