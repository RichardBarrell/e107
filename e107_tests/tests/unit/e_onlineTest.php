<?php
/**
 * Created by PhpStorm.
 * User: Wiz
 * Date: 1/31/2019
 * Time: 1:50 PM
 */


class e_onlineTest extends \Codeception\Test\Unit
{

	/** @var e_online */
	private $on;

	protected function _before()
	{

		try
		{
			$this->on = $this->make('e_online');
			$this->on->__construct();
		}
		catch(Exception $e)
		{
			$this->assertTrue(false, "Couldn't load e_online object");
		}

	}


	/**
	 *
	 */
	/*
			public function testGoOnline()
			{
				$this->on->goOnline(true, true);

				$this->on->goOnline(false, false);
			}
	*/

	public function testIsBot()
	{

		$agents = array(
			"Mozilla/5.0 (compatible; 008/0.83; http://www.80legs.com/webcrawler.html) Gecko/2008032620",
			"Accoona-AI-Agent/1.1.2 (aicrawler at accoonabot dot com)",
			"Accoona-AI-Agent/1.1.2",
			"Accoona-AI-Agent/1.1.1 (crawler at accoona dot com)",
			"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0) AddSugarSpiderBot www.idealobserver.com",
			"Mozilla/5.0 (compatible; AnyApexBot/1.0; +http://www.anyapex.com/bot.html)",
			"Mozilla/4.0 (compatible; Arachmo)",
			"Mozilla/4.0 (compatible; B-l-i-t-z-B-O-T)",
			"Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)",
			"Baiduspider+(+http://www.baidu.com/search/spider_jp.html)",
			"Baiduspider+(+http://www.baidu.com/search/spider.htm)",
			"Mozilla/5.0 (compatible; BecomeBot/3.0; MSIE 6.0 compatible; +http://www.become.com/site_owners.html)",
			"Mozilla/5.0 (compatible; BecomeBot/2.3; MSIE 6.0 compatible; +http://www.become.com/site_owners.html)",
			"Mozilla/5.0 (compatible; BeslistBot; nl; BeslistBot 1.0; http://www.beslist.nl/",
			"BillyBobBot/1.0 (+http://www.billybobbot.com/crawler/)",
			"Bimbot/1.0",
			"Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)",
			"Mozilla/5.0 (compatible; bingbot/2.0 +http://www.bing.com/bingbot.htm)",
			"Mozilla/4.0 (compatible; BlitzBot)",
			"boitho.com-dc/0.85 ( http://www.boitho.com/dcbot.html )",
			"boitho.com-dc/0.83 ( http://www.boitho.com/dcbot.html )",
			"boitho.com-dc/0.82 ( http://www.boitho.com/dcbot.html )",
			"boitho.com-dc/0.81 ( http://www.boitho.com/dcbot.html )",
			"boitho.com-dc/0.79 ( http://www.boitho.com/dcbot.html )",
			"boitho.com-robot/1.1",
			"boitho.com-robot/1.0",
			"btbot/0.4 (+http://www.btbot.com/btbot.html)",
			"CatchBot/2.0; +http://www.catchbot.com",
			"CatchBot/1.0; +http://www.catchbot.com",
			"CatchBot/1.0; http://www.catchbot.com",
			"Mozilla/4.0 (compatible; Cerberian Drtrs Version-3.2-Build-1)",
			"Mozilla/4.0 (compatible; Cerberian Drtrs Version-3.2-Build-0)",
			"Mozilla/5.0 (compatible; Charlotte/1.1; http://www.searchme.com/support/)",
			"Mozilla/5.0 (compatible; Charlotte/1.0t; http://www.searchme.com/support/)",
			"Mozilla/5.0 (compatible; Charlotte/1.0b; http://www.searchme.com/support/)",
			"Mozilla/5.0 (compatible; Charlotte/1.0b; http://www.betaspider.com/)",
			"Mozilla/5.0 (X11; U; Linux i686 (x86_64); en-US; rv:1.8.1.11) Gecko/20080109 (Charlotte/0.9t; http://www.searchme.com/support/) (Charlotte/0.9t; http://www.searchme.com/support/)",
			"Mozilla/5.0 (X11; U; Linux i686 (x86_64); en-US; rv:1.8.1.11) Gecko/20080109 (Charlotte/0.9t; http://www.searchme.com/support/)",
			"Mozilla/5.0 (compatible; Charlotte/0.9t; http://www.searchme.com/support/)",
			"Mozilla/5.0 (compatible; Charlotte/0.9t; +http://www.searchme.com/support/)",
			"ConveraCrawler/0.9e (+http://ews.converasearch.com/crawl.htm)",
			"ConveraCrawler/0.9d (+http://www.authoritativeweb.com/crawl)",
			"ConveraCrawler/0.9d ( http://www.authoritativeweb.com/crawl)",
			"ConveraCrawler/0.9 (+http://www.authoritativeweb.com/crawl)",
			"cosmos/0.9_(robot@xyleme.com)",
			"Covario-IDS/1.0 (Covario; http://www.covario.com/ids; support at covario dot com)",
			"DataparkSearch/4.37-23012006 ( http://www.dataparksearch.org/)",
			"DataparkSearch/4.36 ( http://www.dataparksearch.org/)",
			"DataparkSearch/4.35-02122005 ( http://www.dataparksearch.org/)",
			"DataparkSearch/4.35 ( http://www.dataparksearch.org/)",
			"Mozilla/5.0 (compatible; discobot/1.0; +http://discoveryengine.com/discobot.html)",
			"Mozilla/5.0 (compatible; DotBot/1.1; http://www.dotnetdotcom.org/, crawler@dotnetdotcom.org)",
			"DotBot/1.0.1 (http://www.dotnetdotcom.org/#info, crawler@dotnetdotcom.org)",
			"EmeraldShield.com WebBot (http://www.emeraldshield.com/webbot.aspx)",
			"envolk[ITS]spider/1.6 (+http://www.envolk.com/envolkspider.html)",
			"envolk[ITS]spider/1.6 ( http://www.envolk.com/envolkspider.html)",
			"EsperanzaBot(+http://www.esperanza.to/bot/)",
			"Exabot/2.0",
			"FAST Enterprise Crawler 6 / Scirus scirus-crawler@fast.no; http://www.scirus.com/srsapp/contactus/",
			"FAST Enteprise Crawler/6 (www dot fastsearch dot com)",
			"FAST-WebCrawler/3.8 (atw-crawler at fast dot no; http://fast.no/support/crawler.asp)",
			"FAST-WebCrawler/3.7/FirstPage (atw-crawler at fast dot no;http://fast.no/support/crawler.asp)",
			"FAST-WebCrawler/3.7 (atw-crawler at fast dot no; http://fast.no/support/crawler.asp)",
			"FAST-WebCrawler/3.6/FirstPage (atw-crawler at fast dot no;http://fast.no/support/crawler.asp)",
			"FAST-WebCrawler/3.6 (atw-crawler at fast dot no; http://fast.no/support/crawler.asp)",
			"FAST-WebCrawler/3.6",
			"FAST-WebCrawler/3.x Multimedia (mm dash crawler at fast dot no)",
			"FAST-WebCrawler/3.x Multimedia",
			"Mozilla/4.0 (compatible: FDSE robot)",
			"findlinks/2.0.1 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1.6-beta6 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1.6-beta4 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1.6-beta1 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1.5-beta7 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1.4-beta1 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1.3-beta9 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1.3-beta8 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1.3-beta6 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1.3-beta4 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1.3-beta2 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1.3-beta1 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1.2-a5 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1.1-a5 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1.1-a1 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1.1 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1-a9 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1-a8 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1-a8 ( http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1-a7 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1-a5 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1-a4 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1-a3 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.1 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.06 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.0.9 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.0.8 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"findlinks/1.0 (+http://wortschatz.uni-leipzig.de/findlinks/)",
			"Mozilla/4.0 compatible FurlBot/Furl Search 2.0 (FurlBot; http://www.furl.net; wn.furlbot@looksmart.net)",
			"FyberSpider (+http://www.fybersearch.com/fyberspider.php)",
			"Gaisbot/3.0+(robot06@gais.cs.ccu.edu.tw;+http://gais.cs.ccu.edu.tw/robot.php)",
			"Gaisbot/3.0+(robot05@gais.cs.ccu.edu.tw;+http://gais.cs.ccu.edu.tw/robot.php)",
			"Gaisbot/3.0 (jerry_wu@openfind.com.tw; http://gais.cs.ccu.edu.tw/robot.php)",
			"GalaxyBot/1.0 (http://www.galaxy.com/galaxybot.html)",
			"genieBot (http://64.5.245.11/faq/faq.html)",
			"genieBot ((http://64.5.245.11/faq/faq.html))",
			"Gigabot/3.0 (http://www.gigablast.com/spider.html)",
			"Gigabot/2.0/gigablast.com/spider.html",
			"Gigabot/2.0 (http://www.gigablast.com/spider.html)",
			"Gigabot/2.0",
			"Gigabot/1.0",
			"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; SV1; .NET CLR 1.1.4322; Girafabot [girafa.com])",
			"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 4.0; Girafabot; girafabot at girafa dot com; http://www.girafa.com)",
			"Mozilla/4.0 (compatible; MSIE 5.0; Windows NT; Girafabot; girafabot at girafa dot com; http://www.girafa.com)",
			"Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)",
			"Googlebot/2.1 (+http://www.googlebot.com/bot.html)",
			"Googlebot/2.1 (+http://www.google.com/bot.html)",
			"Googlebot-Image/1.0",
			"Mozilla/5.0 GurujiBot/1.0 (+http://www.guruji.com/en/WebmasterFAQ.html)",
			"Mozilla/5.0 GurujiBot/1.0 ( http://www.guruji.com/en/WebmasterFAQ.html)",
			"Mozilla/5.0 (compatible; GurujiBot/1.0; +http://www.guruji.com/en/WebmasterFAQ.html)",
			"GurujiBot/1.0 (+http://www.guruji.com/WebmasterFAQ.html)",
			"GurujiBot/1.0 (+http://www.guruji.com/en/WebmasterFAQ.html)",
			"HappyFunBot/1.1 ( http://www.happyfunsearch.com/bot.html)",
			"holmes/3.9 (someurl.co.cc)",
			"holmes/3.12.4 (http://morfeo.centrum.cz/bot)",
			"holmes/3.12.3 (http://morfeo.centrum.cz/bot)",
			"holmes/3.12.2 (http://morfeo.centrum.cz/bot)",
			"holmes/3.12.1 (http://morfeo.centrum.cz/bot)",
			"Crawler of the ht://Dig Group's software package, a system for indexing and searching a finite (not necessarily small) set of sites or intranet. It is not meant to replace any of the many internet-wide search engines. htdig retrieves HTML documents using the HTTP protocol.",
			"htdig/3.1.6 (unconfigured@htdig.searchengine.maintainer)",
			"htdig/3.1.6 (mathieu.peltier@inrialpes.fr)",
			"htdig/3.1.5 (webmaster@online-medien.de)",
			"htdig/3.1.5 (root@localhost)",
			"htdig/3.1.5 (infosys@storm.rmi.org)",
			"htdig/3.1.5",
			"iaskspider/2.0(+http://iask.com/help/help_index.html)",
			"ia_archiver/8.9 (Windows NT 3.1; en-US;)",
			"ia_archiver/8.9 (Windows 3.9; en-US;)",
			"ia_archiver/8.9 (Linux 1.0; en-US;)",
			"ia_archiver/8.8 (Windows XP 7.2; en-US;)",
			"ia_archiver/8.8 (Windows XP 3.0; en-US;)",
			"ia_archiver/8.2 (Windows 7.6; en-US;)",
			"ia_archiver/8.1 (Windows 2000 1.9; en-US;)",
			"ia_archiver/8.0 (Windows 2.4; en-US;)",
			"iCCrawler (http://www.iccenter.net/bot.htm)",
			"ichiro/4.0 (http://help.goo.ne.jp/door/crawler.html)",
			"ichiro/3.0 (http://help.goo.ne.jp/door/crawler.html)",
			"ichiro/2.0+(http://help.goo.ne.jp/door/crawler.html)",
			"ichiro/2.0 (ichiro@nttr.co.jp)",
			"ichiro/2.0 (http://help.goo.ne.jp/door/crawler.html)",
			"igdeSpyder (compatible; igde.ru; +http://igde.ru/doc/tech.html)",
			"IRLbot/3.0 (compatible; MSIE 6.0; http://irl.cs.tamu.edu/crawler/)",
			"IRLbot/3.0 (compatible; MSIE 6.0; http://irl.cs.tamu.edu/crawler)",
			"IRLbot/2.0 (compatible; MSIE 6.0; http://irl.cs.tamu.edu/crawler)",
			"IRLbot/2.0 (+http://irl.cs.tamu.edu/crawler)",
			"IRLbot/2.0 ( http://irl.cs.tamu.edu/crawler)",
			"Jaxified Bot (+http://www.jaxified.com/crawler/)",
			"Jyxobot/1",
			"Mozilla/5.0 (compatible; KoepaBot BETA; http://www.koepa.nl/bot.html)",
			"L.webis/0.87 (http://webalgo.iit.cnr.it/index.php?pg=lwebis)",
			"LapozzBot/1.4 (+http://robot.lapozz.com)",
			"Mozilla/5.0 larbin@unspecified.mail",
			"ldspider (http://code.google.com/p/ldspider/wiki/Robots)",
			"LexxeBot/1.0 (lexxebot@lexxe.com)",
			"Linguee Bot (http://www.linguee.com/bot; bot@linguee.com)",
			"LinkWalker/2.0",
			"lwp-trivial/1.41",
			"lwp-trivial/1.38",
			"lwp-trivial/1.36",
			"lwp-trivial/1.35",
			"lwp-trivial/1.33",
			"http://www.mabontland.com",
			"magpie-crawler/1.1 (U; Linux amd64; en-GB; +http://www.brandwatch.net)",
			"Mediapartners-Google/2.1",
			"Mozilla/5.0 (compatible; MJ12bot/v1.2.4; http://www.majestic12.co.uk/bot.php?+)",
			"Mozilla/5.0 (compatible; MJ12bot/v1.2.3; http://www.majestic12.co.uk/bot.php?+)",
			"MJ12bot/v1.0.8 (http://majestic12.co.uk/bot.php?+)",
			"MJ12bot/v1.0.7 (http://majestic12.co.uk/bot.php?+)",
			"MJ12bot/v1.0.6 (http://majestic12.co.uk/bot.php?+)",
			"MJ12bot/v1.0.5 (http://majestic12.co.uk/bot.php?+)",
			"mogimogi/1.0",
			"Mozilla/5.0 (compatible; MojeekBot/2.0; http://www.mojeek.com/bot.html)",
			"MojeekBot/0.2 (archi; http://www.mojeek.com/bot.html)",
			"Moreoverbot/5.1 ( http://w.moreover.com; webmaster@moreover.com) Mozilla/5.0",
			"Moreoverbot/5.00 (+http://www.moreover.com; webmaster@moreover.com)",
			"Moreoverbot/5.00 (+http://www.moreover.com)",
			"msnbot/2.1",
			"msnbot/2.0b",
			"msnbot/1.1 (+http://search.msn.com/msnbot.htm)",
			"msnbot/1.1",
			"msnbot/1.0 (+http://search.msn.com/msnbot.htm)",
			"msnbot/0.9 (+http://search.msn.com/msnbot.htm)",
			"msnbot/0.11 ( http://search.msn.com/msnbot.htm)",
			"MSNBOT/0.1 (http://search.msn.com/msnbot.htm)",
			"MSRBOT (http://research.microsoft.com/research/sv/msrbot/)",
			"Mozilla/5.0 (compatible; mxbot/1.0; +http://www.chainn.com/mxbot.html)",
			"Mozilla/5.0 (compatible; mxbot/1.0; http://www.chainn.com/mxbot.html)",
			"NetResearchServer/4.0(loopimprovements.com/robot.html)",
			"NetResearchServer/3.5(loopimprovements.com/robot.html)",
			"NetResearchServer/2.8(loopimprovements.com/robot.html)",
			"NetResearchServer/2.7(loopimprovements.com/robot.html)",
			"NetResearchServer/2.5(loopimprovements.com/robot.html)",
			"NetResearchServer(http://www.look.com)",
			"Mozilla/5.0 (compatible; NetSeer crawler/2.0; +http://www.netseer.com/crawler.html; crawler@netseer.com)",
			"NewsGator/2.5 (http://www.newsgator.com; Microsoft Windows NT 5.1.2600.0; .NET CLR 1.1.4322.2032)",
			"NewsGator/2.0 Bot (http://www.newsgator.com)",
			"NG-Search/0.9.8 (http://www.ng-search.com)",
			"NG-Search/0.86 (+http://www.ng-search.com)",
			"NG-Search/0.86 ( http://www.ng-search.com)",
			"noxtrumbot/1.0 (crawler@noxtrum.com)",
			"NutchCVS/0.8-dev (Nutch; http://lucene.apache.org/nutch/bot.html; nutch-agent@lucene.apache.org)",
			"NutchCVS/0.7.2 (Nutch; http://lucene.apache.org/nutch/bot.html; nutch-agent@lucene.apache.org)",
			"NutchCVS/0.7.1 (Nutch; http://lucene.apache.org/nutch/bot.html; nutch-agent@lucene.apache.org)",
			"NutchCVS/0.7.1 (Nutch running at UW; http://crawlers.cs.washington.edu/; sycrawl@cs.washington.edu)",
			"NutchCVS/0.7 (Nutch; http://lucene.apache.org/nutch/bot.html; nutch-agent@lucene.apache.org)",
			"NutchCVS/0.06-dev (Nutch; http://www.nutch.org/docs/en/bot.html; nutch-agent@lists.sourceforge.net)",
			"NutchCVS/0.06-dev (Nutch; http://www.nutch.org/docs/en/bot.html; jagdeepssandhu@hotmail.com)",
			"NutchCVS/0.05 (Nutch; http://www.nutch.org/docs/en/bot.html; nutch-agent@lists.sourceforge.net)",
			"Nymesis/1.0 (http://nymesis.com)",
			"Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 4.0; obot)",
			"omgilibot/0.4 +http://omgili.com",
			"omgilibot/0.3 +http://www.omgili.com/Crawler.html",
			"omgilibot/0.3 http://www.omgili.com/Crawler.html",
			"OmniExplorer_Bot/6.70 (+http://www.omni-explorer.com) WorldIndexer",
			"OmniExplorer_Bot/6.65a (+http://www.omni-explorer.com) WorldIndexer",
			"OmniExplorer_Bot/6.63b (+http://www.omni-explorer.com) WorldIndexer",
			"OmniExplorer_Bot/6.62 (+http://www.omni-explorer.com) WorldIndexer",
			"OmniExplorer_Bot/6.60 (+http://www.omni-explorer.com) WorldIndexer",
			"OmniExplorer_Bot/6.47 (+http://www.omni-explorer.com) WorldIndexer",
			"OmniExplorer_Bot/5.91c (+http://www.omni-explorer.com) WorldIndexer",
			"OmniExplorer_Bot/5.28 (+http://www.omni-explorer.com) WorldIndexer",
			"OmniExplorer_Bot/5.25 (+http://www.omni-explorer.com) WorldIndexer",
			"OmniExplorer_Bot/5.20 (+http://www.omni-explorer.com) WorldIndexer",
			"OmniExplorer_Bot/5.01 (+http://www.omni-explorer.com) WorldIndexer",
			"OmniExplorer_Bot/4.80 (+http://www.omni-explorer.com) WorldIndexer",
			"OmniExplorer_Bot/4.32 (+http://www.omni-explorer.com) WorldIndexer",
			"OOZBOT/0.20 ( -- ; http://www.setooz.com/oozbot.html ; agentname at setooz dot_com )",
			"OOZBOT/0.17 (--; http://www.setooz.com/oozbot.html; pvvpr at iiit dot ac dot in)",
			"Orbiter (+http://www.dailyorbit.com/bot.htm)",
			"Crawler for PageBites, a search engine for job openings and/or r?sum?s. You can also post your r?sum? and/or job opening to them.",
			"PageBitesHyperBot/600 (http://www.pagebites.com/)",
			"Mozilla/5.0 (compatible; Peew/1.0; http://www.peew.de/crawler/)",
			"polybot 1.0 (http://cis.poly.edu/polybot/)",
			"Pompos/1.3 http://dir.com/pompos.html",
			"Pompos/1.2 http://pompos.iliad.fr",
			"Pompos/1.1 http://pompos.iliad.fr",
			"PostPost/1.0 (+http://postpo.st/crawlers)",
			"psbot/0.1 (+http://www.picsearch.com/bot.html)",
			"PycURL/7.23.1",
			"PycURL/7.19.7",
			"PycURL/7.19.5",
			"PycURL/7.19.3",
			"PycURL/7.19.0",
			"PycURL/7.18.2",
			"PycURL/7.18.0",
			"PycURL/7.16.4",
			"PycURL/7.15.5",
			"PycURL/7.13.2",
			"radian6_default_(www.radian6.com/crawler)",
			"RAMPyBot - www.giveRAMP.com/0.1 (RAMPyBot - www.giveRAMP.com; http://www.giveramp.com/bot.html; support@giveRAMP.com)",
			"RufusBot (Rufus Web Miner; http://64.124.122.252/feedback.html)",
			"SBIder/0.8-dev (SBIder; http://www.sitesell.com/sbider.html; http://support.sitesell.com/contact-support.html)",
			"Mozilla/5.0 (compatible; ScoutJet; http://www.scoutjet.com/)",
			"Scrubby/2.2 (http://www.scrubtheweb.com/)",
			"Mozilla/5.0 (compatible; Scrubby/2.2; +http://www.scrubtheweb.com/)",
			"Mozilla/5.0 (compatible; Scrubby/2.2; http://www.scrubtheweb.com/)",
			"Scrubby/2.1 (http://www.scrubtheweb.com/)",
			"Mozilla/5.0 (compatible; Scrubby/2.1; +http://www.scrubtheweb.com/abs/meta-check.html)",
			"SearchSight/2.0 (http://SearchSight.com/)",
			"Seekbot/1.0 (http://www.seekbot.net/bot.html) RobotsTxtFetcher/1.2",
			"Seekbot/1.0 (http://www.seekbot.net/bot.html) HTTPFetcher/2.1",
			"Seekbot/1.0 (http://www.seekbot.net/bot.html) HTTPFetcher/0.3",
			"Seekbot/1.0 (http://www.seekbot.net/bot.html)",
			"semanticdiscovery/0.1",
			"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0) SEOChat::Bot v1.1",
			"SeznamBot/2.0 (+http://fulltext.seznam.cz/)",
			"SeznamBot/2.0 (+http://fulltext.sblog.cz/robot/)",
			"Shim-Crawler(Mozilla-compatible; http://www.logos.ic.i.u-tokyo.ac.jp/crawler/; crawl@logos.ic.i.u-tokyo.ac.jp)",
			"ShopWiki/1.0 ( +http://www.shopwiki.com/wiki/Help:Bot)",
			"Mozilla/4.0 (compatible: Shoula robot)",
			"silk/1.0 (+http://www.slider.com/silk.htm)/3.7",
			"Silk/1.0",
			"Mozilla/5.0 (compatible; SiteBot/0.1; +http://www.sitebot.org/robot/)",
			"Mozilla/5.0 (compatible; SiteBot/0.1; http://www.sitebot.org/robot/)",
			"Snappy/1.1 ( http://www.urltrends.com/ )",
			"Sosospider+(+http://help.soso.com/webspider.htm)",
			"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) Speedy Spider (http://www.entireweb.com/about/search_tech/speedy_spider/)",
			"Mozilla/5.0 (compatible; Speedy Spider; http://www.entireweb.com/about/search_tech/speedy_spider/)",
			"Speedy Spider (Entireweb; Beta/1.3; http://www.entireweb.com/about/search_tech/speedyspider/)",
			"Speedy Spider (Entireweb; Beta/1.2; http://www.entireweb.com/about/search_tech/speedyspider/)",
			"Speedy Spider (Entireweb; Beta/1.1; http://www.entireweb.com/about/search_tech/speedyspider/)",
			"Speedy Spider (Entireweb; Beta/1.0; http://www.entireweb.com/about/search_tech/speedyspider/)",
			"Speedy Spider (Beta/1.0; www.entireweb.com)",
			"Speedy Spider (http://www.entireweb.com/about/search_tech/speedy_spider/)",
			"Speedy Spider (http://www.entireweb.com/about/search_tech/speedyspider/)",
			"Speedy Spider (http://www.entireweb.com)",
			"Sqworm/2.9.85-BETA (beta_release; 20011115-775; i686-pc-linux-gnu)",
			"StackRambler/2.0 (MSIE incompatible)",
			"StackRambler/2.0",
			"Mozilla/5.0 (compatible; suggybot v0.01a, http://blog.suggy.com/was-ist-suggy/suggy-webcrawler/)",
			"SurveyBot/2.3+(Whois+Source)",
			"SurveyBot/2.3 (Whois Source)",
			"SynooBot/0.7.1 (SynooBot; http://www.synoo.de/bot.html; webmaster@synoo.com)",
			"Mozilla/2.0 (compatible; Ask Jeeves/Teoma; +http://sp.ask.com/docs/about/tech_crawling.html)",
			"Mozilla/2.0 (compatible; Ask Jeeves/Teoma; +http://about.ask.com/en/docs/about/webmasters.shtml)",
			"Mozilla/2.0 (compatible; Ask Jeeves/Teoma)",
			"TerrawizBot/1.0 (+http://www.terrawiz.com/bot.html)",
			"TheSuBot/0.2 (www.thesubot.de)",
			"TheSuBot/0.1 (www.thesubot.de)",
			"Thumbnail.CZ robot 1.1 (http://thumbnail.cz/why-no-robots-txt.html)",
			"TinEye/1.1 (http://tineye.com/crawler.html)",
			"truwoGPS/1.0 (GNU/Linux; U; i686; en-US; +http://www.lan4lano.net/browser.html )",
			"TurnitinBot/2.1 (http://www.turnitin.com/robot/crawlerinfo.html)",
			"TurnitinBot/2.0 http://www.turnitin.com/robot/crawlerinfo.html",
			"TurnitinBot/1.5 http://www.turnitin.com/robot/crawlerinfo.html",
			"TurnitinBot/1.5 (http://www.turnitin.com/robot/crawlerinfo.html)",
			"TurnitinBot/1.5 http://www.turnitin.com/robot/crawlerinfo.html",
			"TurnitinBot/1.5 (http://www.turnitin.com/robot/crawlerinfo.html)",
			"Mozilla/5.0 (compatible; TweetedTimes Bot/1.0; http://tweetedtimes.com)",
			"updated/0.1-beta (updated; http://www.updated.com; updated@updated.com)",
			"Mozilla/5.0 (compatible; Urlfilebot/2.2; +http://urlfile.com/bot.html)",
			"Mozilla/4.0 (compatible; Vagabondo/4.0Beta; webcrawler at wise-guys dot nl; http://webagent.wise-guys.nl/; http://www.wise-guys.nl/)",
			"Mozilla/4.0 (compatible; Vagabondo/2.2; webcrawler at wise-guys dot nl; http://webagent.wise-guys.nl/)",
			"Mozilla/5.0 (compatible; Vagabondo/2.1; webcrawler at wise-guys dot nl; http://webagent.wise-guys.nl/)",
			"Mozilla/3.0 (Vagabondo/2.0 MT; webcrawler@NOSPAMexperimental.net; http://aanmelden.ilse.nl/?aanmeld_mode=webhints)",
			"Mozilla/4.0 (compatible; MSIE 5.0; Windows 95) VoilaBot BETA 1.2 (http://www.voila.com/)",
			"Vortex/2.2 (+http://marty.anstey.ca/robots/vortex/)",
			"Vortex/2.2 ( http://marty.anstey.ca/robots/vortex/)",
			"VORTEX/1.2 ( http://marty.anstey.ca/robots/vortex/)",
			"voyager/2.0 (http://www.kosmix.com/crawler.html)",
			"voyager/1.0",
			"webcollage/1.93",
			"webcollage/1.129",
			"webcollage/1.125",
			"webcollage/1.117",
			"webcollage/1.114",
			"http://www.almaden.ibm.com/cs/crawler [wf84]",
			"WoFindeIch Robot 1.0(+http://www.search.wofindeich.com/robot.php)",
			"WoFindeIch Robot 1.0( http://www.search.wofindeich.com/robot.php)",
			"WomlpeFactory/0.1 (+http://www.Womple.com/bot.html)",
			"Xaldon_WebSpider/2.0.b1",
			"Xaldon_WebSpider/2.0.b1",
			"yacybot (x86 Windows XP 5.1; java 1.6.0_12; Europe/de) http://yacy.net/bot.html",
			"yacybot (x86 Windows XP 5.1; java 1.6.0_11; Europe/de) http://yacy.net/bot.html",
			"yacybot (x86 Windows XP 5.1; java 1.6.0; Europe/de) http://yacy.net/yacy/bot.html",
			"yacybot (x86 Windows 2000 5.0; java 1.6.0_16; Europe/de) http://yacy.net/bot.html",
			"yacybot (ppc Mac OS X 10.5.2; java 1.5.0_13; Europe/de) http://yacy.net/bot.html",
			"yacybot (ppc Mac OS X 10.4.10; java 1.5.0_07; Europe/de) http://yacy.net/bot.html",
			"yacybot (i386 Mac OS X 10.5.7; java 1.5.0_16; Europe/de) http://yacy.net/bot.html",
			"yacybot (i386 Linux 2.6.9-023stab046.2-smp; java 1.6.0_05; Europe/en) http://yacy.net/bot.html",
			"yacybot (i386 Linux 2.6.8-022stab070.5-enterprise; java 1.4.2-03; Europe/en) yacy.net",
			"yacybot (i386 Linux 2.6.31-16-generic; java 1.6.0_15; Europe/en) http://yacy.net/bot.html",
			"yacybot (i386 Linux 2.6.26-2-686; java 1.6.0_0; Europe/en) http://yacy.net/bot.html",
			"yacybot (i386 Linux 2.6.24-28-generic; java 1.6.0_20; Europe/en) http://yacy.net/bot.html",
			"yacybot (i386 Linux 2.6.24-24-generic; java 1.6.0_07; Europe/en) http://yacy.net/bot.html",
			"yacybot (i386 Linux 2.6.24-23-generic; java 1.6.0_16; Europe/en) http://yacy.net/bot.html",
			"yacybot (i386 Linux 2.6.23; java 1.6.0_17; Europe/en) http://yacy.net/bot.html",
			"yacybot (i386 Linux 2.6.23; java 1.6.0_04; Europe/en) http://yacy.net/bot.html",
			"yacybot (i386 Linux 2.6.22-14-generic; java 1.6.0_03; Europe/de) http://yacy.net/bot.html",
			"yacybot (amd64 Windows 7 6.1; java 1.6.0_17; Europe/de) http://yacy.net/bot.html",
			"yacybot (amd64 Linux 2.6.28-18-generic; java 1.6.0_0; Europe/en) http://yacy.net/bot.html",
			"yacybot (amd64 Linux 2.6.16-2-amd64-k8-smp; java 1.5.0_10; Europe/en) http://yacy.net/yacy/bot.html",
			"Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)",
			"Mozilla/5.0 (compatible; Yahoo! Slurp China; http://misc.yahoo.com.cn/help.html)",
			"YahooSeeker/1.2 (compatible; Mozilla 4.0; MSIE 5.5; yahooseeker at yahoo-inc dot com ; http://help.yahoo.com/help/us/shop/merchant/)",
			"YahooSeeker-Testing/v3.9 (compatible; Mozilla 4.0; MSIE 5.5; http://search.yahoo.com/)",
			"Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)",
			"Mozilla/5.0 (compatible; YandexImages/3.0; +http://yandex.com/bots)",
			"Yasaklibot/v1.2 (http://www.Yasakli.com/bot.php)",
			"Yeti/1.0 (NHN Corp.; http://help.naver.com/robots/)",
			"Yeti/1.0 (+http://help.naver.com/robots/)",
			"Mozilla/5.0 (compatible; YodaoBot/1.0; http://www.yodao.com/help/webmaster/spider/; )",
			"yoogliFetchAgent/0.1",
			"Mozilla/5.0 (compatible; YoudaoBot/1.0; http://www.youdao.com/help/webmaster/spider/; )",
			"Zao/0.1 (http://www.kototoi.org/zao/)",
			"Zao/0.1 (http://www.kototoi.org/zao/)",
			"Mozilla/4.0 (compatible; Zealbot 1.0)",
			"zspider/0.9-dev http://feedback.redkolibri.com/",
			"Mozilla/4.0 compatible ZyBorg/1.0 DLC (wn.zyborg@looksmart.net; http://www.WISEnutbot.com)",
			"Mozilla/4.0 compatible ZyBorg/1.0 Dead Link Checker (wn.zyborg@looksmart.net; http://www.WISEnutbot.com)",
			"Mozilla/4.0 compatible ZyBorg/1.0 Dead Link Checker (wn.dlc@looksmart.net; http://www.WISEnutbot.com)",
			"Mozilla/4.0 compatible ZyBorg/1.0 (wn.zyborg@looksmart.net; http://www.WISEnutbot.com)",
			"Mozilla/4.0 compatible ZyBorg/1.0 (wn-16.zyborg@looksmart.net; http://www.WISEnutbot.com)",
			"Mozilla/4.0 compatible ZyBorg/1.0 (wn-14.zyborg@looksmart.net; http://www.WISEnutbot.com)"
		);

		foreach($agents as $agent)
		{
			$result = $this->on->isBot($agent);
			$this->assertTrue($result, 'Failed asserting that "' . $agent . '" is a bot/crawler');
		}
	}
	/*
			public function testGuestList()
			{

			}

			public function testUserList()
			{
				$this->on->goOnline();
				$result = $this->on->userList();
				var_export($result);
			}*/
}
