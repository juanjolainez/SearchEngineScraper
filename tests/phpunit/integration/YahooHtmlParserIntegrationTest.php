<?php

/*
 * This file is made to test the GoogleHtmlParser model
 */

namespace tests;

require_once __DIR__ . "/../../../Parsers/YahooHtmlParser.php";

use PHPUnit\Framework\TestCase;


class YahooHtmlParserIntegrationTest extends TestCase
{

    protected function getExpectedResults()
    {
        return [
            [
                'title' => "View All 3 Credit Scores - TransUnion, Equifax, Experian",
                'link' => "https://r.search.yahoo.com/cbclk2/dWU9QjdERTk4RjEwQTBCNEY1OCZ1dD0xNTI1MzEzNTU3NDk2JnVvPTc3NDQ2ODYyMjY5MjQzJmx0PTImZXM9TGRvenc3MEdQUy5UR0hGZCZqZT03MzJjYTk3MC00ZTc3LTExZTgtYjBiNS0zM2EyNTczMjc2ZjctMmJhMzJlNGRhNzAwJnVpPTIxNi4xNDUuNTQuMTU4Jmp0PTE1MjUzMTM1NTc1MTcmcHA9bjE-/RV=2/RE=1525342357/RO=10/RU=https%3a%2f%2fwww.bing.com%2faclick%3fld%3dd3SZVCi9FK04bLUw2Dop-iEzVUCUz-fuzWqlI28DncsER16bUJU4OMW2ch61fUAEYCqBiXljMF3-rtsjRam1sWa3KCqlVBXK1Hw8YlX34vDEOmUe9MCTYBzUL8BYLs6c_Y_vj-Z3hDi_qpAO2d1qmffQfxV_gVy6kSyXTYnB8f2iVtoHCD%26u%3dhttps%253a%252f%252fwww.checkfreescore.com%252fredirect.asp%253fguid%253d1BLWD02U09E1%2526sid%253dB_b_free%252520equifax%252520credit%252520score%2526msclkid%253d%257bmsclkid%257d/RK=2/RS=CHhiG0inanN90yZYhgS_lAaYlDI-;_ylt=Awr9Gi8VcOpa4TcAKn1XNyoA;_ylu=X3oDMTB2NjJ0cGtlBGNvbG8DZ3ExBHBvcwMxBHZ0aWQDBHNlYwNvdi10b3A-?p=creditorwatch"
            ],
            [
                'title' => "Free 3 Credit Scores - Check Your Credit Scores",
                'link' => "https://r.search.yahoo.com/cbclk2/dWU9QjdERTk4RjEwQTBCNEY1OCZ1dD0xNTI1MzEzNTU3NDk2JnVvPTc4MzQwMjMzMjAyOTUxJmx0PTImZXM9QXQwLlNkd0dQUy4yeEpwbyZqZT03MzJjYTk3MC00ZTc3LTExZTgtYjBiNS0zM2EyNTczMjc2ZjctMmJhMzJlNGRhNzAwJnVpPTIxNi4xNDUuNTQuMTU4Jmp0PTE1MjUzMTM1NTc1MTcmcHA9bjI-/RV=2/RE=1525342357/RO=10/RU=https%3a%2f%2fwww.bing.com%2faclick%3fld%3dd3_uSz2fkWJThLx2x1YpiJ9zVUCUzNZa3BIGRqRIpkm2Tuk-dvNY1-yb3ZCxWcGIq8-8p_Yah9DVfsVIfZ25ZinlZt3ike0IvLRfm5RPhh_NOOFaabXPHY326uWKBohZgnNSDuxQAmuuxMYYegWs_7zmm2CL5GtG-hlIrpB4jNZpil8jmz%26u%3dhttp%253a%252f%252fpixel.everesttech.net%252f4812%252fcq%253fev_sid%253d10%2526ev_ltx%253d%2526ev_lx%253d30288069196%2526ev_crx%253d78340233202951%2526ev_mt%253db%2526ev_dvc%253dc%2526url%253dhttps%25253A%252f%252fwww.freescoreonline.com%252fEnterCampaign.aspx%25253Fid%25253D2636%252526ord%25253D3857/RK=2/RS=2YwjDW0uCSVjzL.PcfPaqGHx4vE-;_ylt=Awr9Gi8VcOpa4TcAM31XNyoA;_ylu=X3oDMTB2MmRzOHM3BGNvbG8DZ3ExBHBvcwMyBHZ0aWQDBHNlYwNvdi10b3A-?p=creditorwatch"
            ],
            [
                'title' => "CreditorWatch - Official Site",
                'link' => "http://r.search.yahoo.com/_ylt=Awr9Gi8VcOpa4TcAPn1XNyoA;_ylu=X3oDMTByb2lvbXVuBGNvbG8DZ3ExBHBvcwMxBHZ0aWQDBHNlYwNzcg--/RV=2/RE=1525342357/RO=10/RU=https%3a%2f%2fcreditorwatch.com.au%2f/RK=2/RS=A7fkIv7TrsomY_9JkBzRG0D4CRk-"
            ],
            [
                'title' => "CreditorWatch (@creditorwatch) | Twitter",
                'link' => "http://r.search.yahoo.com/_ylt=Awr9Gi8VcOpa4TcAQH1XNyoA;_ylu=X3oDMTByYnR1Zmd1BGNvbG8DZ3ExBHBvcwMyBHZ0aWQDBHNlYwNzcg--/RV=2/RE=1525342357/RO=10/RU=https%3a%2f%2ftwitter.com%2fcreditorwatch/RK=2/RS=6hWtrMXDDt_InETCzyCQPUawRo0-"
            ],
            [
                'title' => "CreditorWatch - Wikipedia",
                'link' => "http://r.search.yahoo.com/_ylt=Awr9Gi8VcOpa4TcAQn1XNyoA;_ylu=X3oDMTByM3V1YTVuBGNvbG8DZ3ExBHBvcwMzBHZ0aWQDBHNlYwNzcg--/RV=2/RE=1525342357/RO=10/RU=https%3a%2f%2fen.wikipedia.org%2fwiki%2fCreditorWatch/RK=2/RS=1YUJzDs4plbdz5bRC95L_T9rhd4-"
            ],
            [
                'title' => "CreditorWatch - Home | Facebook",
                'link' => "http://r.search.yahoo.com/_ylt=Awr9Gi8VcOpa4TcARH1XNyoA;_ylu=X3oDMTByc3RzMXFjBGNvbG8DZ3ExBHBvcwM0BHZ0aWQDBHNlYwNzcg--/RV=2/RE=1525342357/RO=10/RU=https%3a%2f%2fwww.facebook.com%2fCreditorWatch-158362990867063%2f/RK=2/RS=ZDK91od79XBw04gnT45LMfbRlK8-"
            ],
            [
                'title' => "CreditorWatch | LinkedIn",
                'link' => "http://r.search.yahoo.com/_ylt=Awr9Gi8VcOpa4TcARn1XNyoA;_ylu=X3oDMTBya2cwZmh2BGNvbG8DZ3ExBHBvcwM1BHZ0aWQDBHNlYwNzcg--/RV=2/RE=1525342357/RO=10/RU=https%3a%2f%2fwww.linkedin.com%2fcompany%2fcreditor-watch/RK=2/RS=KYYFsFiIN8_DEiOUVqF7.5hQ08Q-"
            ],
            [
                'title' => "Working at CreditorWatch | Glassdoor",
                'link' => "http://r.search.yahoo.com/_ylt=Awr9Gi8VcOpa4TcAR31XNyoA;_ylu=X3oDMTByNDZ0aWFxBGNvbG8DZ3ExBHBvcwM2BHZ0aWQDBHNlYwNzcg--/RV=2/RE=1525342357/RO=10/RU=https%3a%2f%2fwww.glassdoor.com%2fOverview%2fWorking-at-CreditorWatch-EI_IE1061211.11%2c24.htm/RK=2/RS=IbvW5RhflRRz.qGsLb6dx28tMyA-"
            ],
            [
                'title' => "Creditorwatch.com.au - review.easycounter.com",
                'link' => "http://r.search.yahoo.com/_ylt=Awr9Gi8VcOpa4TcASX1XNyoA;_ylu=X3oDMTByMjR0MTVzBGNvbG8DZ3ExBHBvcwM3BHZ0aWQDBHNlYwNzcg--/RV=2/RE=1525342357/RO=10/RU=https%3a%2f%2freview.easycounter.com%2fcreditorwatch.com.au/RK=2/RS=gQEFFFmfXNQsnUhFQoUHQYT3fQg-"
            ],
            [
                'title' => "CreditorWatch - National Collection Services",
                'link' => "http://r.search.yahoo.com/_ylt=Awr9Gi8VcOpa4TcAS31XNyoA;_ylu=X3oDMTByMXM3OWtoBGNvbG8DZ3ExBHBvcwM4BHZ0aWQDBHNlYwNzcg--/RV=2/RE=1525342357/RO=10/RU=https%3a%2f%2fwww.natcollection.com.au%2fcreditorwatch%2f/RK=2/RS=SoGU130FYlnTfpnFYkm9fwC2DJg-"
            ],
            [
                'title' => "CreditorWatch Reviews | Glassdoor.com.au",
                'link' => "http://r.search.yahoo.com/_ylt=Awr9Gi8VcOpa4TcATX1XNyoA;_ylu=X3oDMTByN3UwbTk1BGNvbG8DZ3ExBHBvcwM5BHZ0aWQDBHNlYwNzcg--/RV=2/RE=1525342357/RO=10/RU=https%3a%2f%2fwww.glassdoor.com.au%2fReviews%2fCreditorWatch-Reviews-E1061211.htm/RK=2/RS=iqIfQPL9dbUQgZho66lnKmxTyw4-"
            ],
            [
                'title' => "Xero Community - CreditorWatch",
                'link' => "http://r.search.yahoo.com/_ylt=Awr9Gi8VcOpa4TcAT31XNyoA;_ylu=X3oDMTBzdmVvZmlwBGNvbG8DZ3ExBHBvcwMxMAR2dGlkAwRzZWMDc3I-/RV=2/RE=1525342357/RO=10/RU=https%3a%2f%2fcommunity.xero.com%2fbusiness%2fdiscussion%2f7396344/RK=2/RS=2hUnn_fkx9_6mxuBaqtZqPzm5VE-"
            ],
            [
                'title' => "Credit Karma® - Official Site - 100% Free Credit Score",
                'link' => "https://r.search.yahoo.com/cbclk2/dWU9QjdERTk4RjEwQTBCNEY1OCZ1dD0xNTI1MzEzNTU3NDk2JnVvPTczMjU0OTk4MTE2NTU2Jmx0PTImZXM9YU1tdjdoc0dQU18zUGQ3LiZqZT03MzJjYTk3MC00ZTc3LTExZTgtYjBiNS0zM2EyNTczMjc2ZjctMmJhMzJlNGRhNzAwJnVpPTIxNi4xNDUuNTQuMTU4Jmp0PTE1MjUzMTM1NTc1MTcmcHA9czE-/RV=2/RE=1525342357/RO=10/RU=https%3a%2f%2fwww.bing.com%2faclick%3fld%3dd3kpVJqV9qMWesfJgeBoIlOjVUCUzkqeCob6HZvgw_3IyvVaq2QBYuOC4htfWvZ2cBrXPHwkOFn6f-rog_ZtXhdqKSvAZifikcrCDmmO7gk0LPT3SjMtXmQdulSt-u0c6cIKqypQqYfNz1obfZI2Dp-dqE8lfkNCvEyi2gB_polzRKuhBe%26u%3dhttps%253a%252f%252fwww.creditkarma.com%252fevents%252fredirect%253freturnurl%253dhttps%25253A%25252F%25252Fwww.creditkarma.com%2526s%253dbing-nb_acq%2526adcampaign%253dBing_ACQ_NB_Competitors-Broad%2526adgroup%253dACR-Broad%2526ovmtc%253db%2526site%253d%257bplacement%257d%2526targetid%253dkwd-73254976289342%253aloc-190%2526adcopy%253d267034715_1172079439229392_73254998116556%2526ovkey%253dannual%252520credit%252520report%2526network%253do%2526adposition%253d%257badposition%257d%2526device%253dc%2526devicemodel%253d%257bdevicemodel%257d%2526aceid%253d%257baceid%257d%2526target%253d%257btarget%257d%2526locphysical%253d43935%2526locinterest%253d%2526feeditemid%253d%2526adtheme%253d%2526msclkid%253d%257bmsclkid%257d/RK=2/RS=X_zAp4OAd7ebVs1Um_cKtUBz5bI-;_ylt=Awr9Gi8VcOpa4TcAUn1XNyoA;_ylu=X3oDMTEyMjJkaXJuBGNvbG8DZ3ExBHBvcwMxBHZ0aWQDBHNlYwNvdi1ib3R0b20-?p=creditorwatch"
            ],
            [
                'title' => "Free 3 Credit Scores - Check Your Credit Scores",
                'link' => "https://r.search.yahoo.com/cbclk2/dWU9QjdERTk4RjEwQTBCNEY1OCZ1dD0xNTI1MzEzNTU3NDk2JnVvPTc4MzQwMjMzMjAyOTUxJmx0PTImZXM9QXQwLlNkd0dQUy4yeEpwbyZqZT03MzJjYTk3MC00ZTc3LTExZTgtYjBiNS0zM2EyNTczMjc2ZjctMmJhMzJlNGRhNzAwJnVpPTIxNi4xNDUuNTQuMTU4Jmp0PTE1MjUzMTM1NTc1MTcmcHA9czI-/RV=2/RE=1525342357/RO=10/RU=https%3a%2f%2fwww.bing.com%2faclick%3fld%3dd3_uSz2fkWJThLx2x1YpiJ9zVUCUzNZa3BIGRqRIpkm2Tuk-dvNY1-yb3ZCxWcGIq8-8p_Yah9DVfsVIfZ25ZinlZt3ike0IvLRfm5RPhh_NOOFaabXPHY326uWKBohZgnNSDuxQAmuuxMYYegWs_7zmm2CL5GtG-hlIrpB4jNZpil8jmz%26u%3dhttp%253a%252f%252fpixel.everesttech.net%252f4812%252fcq%253fev_sid%253d10%2526ev_ltx%253d%2526ev_lx%253d30288069196%2526ev_crx%253d78340233202951%2526ev_mt%253db%2526ev_dvc%253dc%2526url%253dhttps%25253A%252f%252fwww.freescoreonline.com%252fEnterCampaign.aspx%25253Fid%25253D2636%252526ord%25253D3857/RK=2/RS=6srWGKqoJph8SjIu3.XE.pdXiqo-;_ylt=Awr9Gi8VcOpa4TcAVn1XNyoA;_ylu=X3oDMTEybXRwcGhtBGNvbG8DZ3ExBHBvcwMyBHZ0aWQDBHNlYwNvdi1ib3R0b20-?p=creditorwatch"
            ],
            [
                'title' => "View All 3 Credit Scores - TransUnion, Equifax, Experian",
                'link' => "https://r.search.yahoo.com/cbclk2/dWU9QjdERTk4RjEwQTBCNEY1OCZ1dD0xNTI1MzEzNTU3NDk2JnVvPTc3NDQ2ODYyMjY5MjQzJmx0PTImZXM9TGRvenc3MEdQUy5UR0hGZCZqZT03MzJjYTk3MC00ZTc3LTExZTgtYjBiNS0zM2EyNTczMjc2ZjctMmJhMzJlNGRhNzAwJnVpPTIxNi4xNDUuNTQuMTU4Jmp0PTE1MjUzMTM1NTc1MTcmcHA9czM-/RV=2/RE=1525342357/RO=10/RU=https%3a%2f%2fwww.bing.com%2faclick%3fld%3dd3SZVCi9FK04bLUw2Dop-iEzVUCUz-fuzWqlI28DncsER16bUJU4OMW2ch61fUAEYCqBiXljMF3-rtsjRam1sWa3KCqlVBXK1Hw8YlX34vDEOmUe9MCTYBzUL8BYLs6c_Y_vj-Z3hDi_qpAO2d1qmffQfxV_gVy6kSyXTYnB8f2iVtoHCD%26u%3dhttps%253a%252f%252fwww.checkfreescore.com%252fredirect.asp%253fguid%253d1BLWD02U09E1%2526sid%253dB_b_free%252520equifax%252520credit%252520score%2526msclkid%253d%257bmsclkid%257d/RK=2/RS=DMmwNT.LYD7jXFwgqPbAsgSYhFE-;_ylt=Awr9Gi8VcOpa4TcAYH1XNyoA;_ylu=X3oDMTEyaDc3YmQwBGNvbG8DZ3ExBHBvcwMzBHZ0aWQDBHNlYwNvdi1ib3R0b20-?p=creditorwatch"
            ],
            [
                'title' => "Credit Karma® - Official Site - 100% Free Credit Score",
                'link' => "https://r.search.yahoo.com/cbclk2/dWU9QjdERTk4RjEwQTBCNEY1OCZ1dD0xNTI1MzEzNTU3NDk2JnVvPTczMjU0OTk4MTE2NTU2Jmx0PTImZXM9YU1tdjdoc0dQU18zUGQ3LiZqZT03MzJjYTk3MC00ZTc3LTExZTgtYjBiNS0zM2EyNTczMjc2ZjctMmJhMzJlNGRhNzAwJnVpPTIxNi4xNDUuNTQuMTU4Jmp0PTE1MjUzMTM1NTc1MTcmcHA9ZTE-/RV=2/RE=1525342357/RO=10/RU=https%3a%2f%2fwww.bing.com%2faclick%3fld%3dd3kpVJqV9qMWesfJgeBoIlOjVUCUzkqeCob6HZvgw_3IyvVaq2QBYuOC4htfWvZ2cBrXPHwkOFn6f-rog_ZtXhdqKSvAZifikcrCDmmO7gk0LPT3SjMtXmQdulSt-u0c6cIKqypQqYfNz1obfZI2Dp-dqE8lfkNCvEyi2gB_polzRKuhBe%26u%3dhttps%253a%252f%252fwww.creditkarma.com%252fevents%252fredirect%253freturnurl%253dhttps%25253A%25252F%25252Fwww.creditkarma.com%2526s%253dbing-nb_acq%2526adcampaign%253dBing_ACQ_NB_Competitors-Broad%2526adgroup%253dACR-Broad%2526ovmtc%253db%2526site%253d%257bplacement%257d%2526targetid%253dkwd-73254976289342%253aloc-190%2526adcopy%253d267034715_1172079439229392_73254998116556%2526ovkey%253dannual%252520credit%252520report%2526network%253do%2526adposition%253d%257badposition%257d%2526device%253dc%2526devicemodel%253d%257bdevicemodel%257d%2526aceid%253d%257baceid%257d%2526target%253d%257btarget%257d%2526locphysical%253d43935%2526locinterest%253d%2526feeditemid%253d%2526adtheme%253d%2526msclkid%253d%257bmsclkid%257d/RK=2/RS=MPe6eeu5JLujhA66gs.JLi8aViU-;_ylt=Awr9Gi8VcOpa4TcAe31XNyoA;_ylu=X3oDMTEwcjFsNGk5BGNvbG8DZ3ExBHBvcwMxBHZ0aWQDBHNlYwNvdi1lYXN0?p=creditorwatch"
            ],
            [
                'title' => "3-Bureau Credit Scores - Check Your 3-Bureau Score Now",
                'link' => "https://r.search.yahoo.com/cbclk2/dWU9QjdERTk4RjEwQTBCNEY1OCZ1dD0xNTI1MzEzNTU3NDk2JnVvPTc2NTUzNTI1MjIzMDkyJmx0PTImZXM9NVlwbDd5VUdQU19jMDhNSyZqZT03MzJjYTk3MC00ZTc3LTExZTgtYjBiNS0zM2EyNTczMjc2ZjctMmJhMzJlNGRhNzAwJnVpPTIxNi4xNDUuNTQuMTU4Jmp0PTE1MjUzMTM1NTc1MTcmcHA9ZTI-/RV=2/RE=1525342357/RO=10/RU=https%3a%2f%2fwww.bing.com%2faclick%3fld%3dd3n2jONb0ixeZkL_rLa0M6QzVUCUxIweGK5dlawdkMLq9gZJGII27VYcoA-DnVF1kNHLuvycymwsptdJYWChTpUR8MaHx824r2uWdmbUTEfQ9iRq2wx4XXfh1YjFEzKSomYQQI3J1SZYnYBCGFucP0H_CCzedhIo0c06t1c7884HCg-jXK%26u%3dhttp%253a%252f%252fmycredittips.com%252fcredit-scoring-models%252f%253futm_source%253dbing%2526utm_medium%253dcpc%2526utm_campaign%253dmycredittips.com%2526utm_term%253dexperian%252520credit%252520report%252520for%252520free%2526utm_content%253dcredit-scoring-models/RK=2/RS=AjiKDwfhBF06Ow59USNgUo7i4eg-;_ylt=Awr9Gi8VcOpa4TcAf31XNyoA;_ylu=X3oDMTEwZGdtMzdhBGNvbG8DZ3ExBHBvcwMyBHZ0aWQDBHNlYwNvdi1lYXN0?p=creditorwatch"
            ],
        ];
    }

    /**
     * @covers \Parsers\YahooHtmlParser::parseFormat
     */
    public function testParseReturnsDomDocument()
    {
        $data = file_get_contents(__DIR__ . "/fixtures/yahoo_search.html");
        $parser = new \Parsers\YahooHtmlParser();
        $parsed = $parser->parseFormat($data);
        $this->assertInstanceOf('DOMDocument', $parsed);
    }

    /**
     * @covers \Parsers\YahooHtmlParser::parseFormat
     * @covers \Parsers\YahooHtmlParser::filter
     */
    public function testFilter()
    {
        $data = file_get_contents(__DIR__ . "/fixtures/yahoo_search.html");
        $parser = new \Parsers\YahooHtmlParser();
        $parsed = $parser->parseFormat($data);
        $filtered = $parser->filter($parsed);

        $this->assertEquals(count($filtered), 17);
        $this->assertContainsOnly('\DOMElement', $filtered);
    }

    /**
     * @covers \Parsers\YahooHtmlParser::parseData
     */
    public function testParseData()
    {
        $data = file_get_contents(__DIR__ . "/fixtures/yahoo_search.html");
        $parser = new \Parsers\YahooHtmlParser();
        $parsed = $parser->parse($data);
        $expected = $this->getExpectedResults();

        foreach ($parsed as $index => $googleResult) {
            $this->assertEquals($googleResult->getTitle(), $expected[$index]['title']);
            $this->assertEquals($googleResult->getLink(), $expected[$index]['link']);
            $this->assertEquals($googleResult->getProvider(), 'Yahoo!');
        }
    }
}