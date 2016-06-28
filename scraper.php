<?php
require 'scraperwiki.php';
     $url = 'http://www.phonearena.com/phones/Samsung-Infuse-4G_id5119/fullspecs';
     $html = scraperwiki::scrape($url);  
     require 'scraperwiki/simple_html_dom.php';
              $dom = new simple_html_dom();
              $dom->load($html);
     //$dom->remove('span[class=s_tooltip_content]');
                 foreach($dom->find('div[class=s_specs_box] li[class=s_lv_1] ul[class=s_lv_2] li') as $data)
                 {
                    

                    if($data->parent()->parent()->getElementByTagName('strong[class=s_lv_2] span[class=s_tooltip_anchor]'))
                        print $data->parent()->parent()->getElementByTagName('strong[class=s_lv_2] span[class=s_tooltip_anchor]')->plaintext." : ";
                    else
                        print $data->parent()->parent()->getElementByTagName('strong[class=s_lv_2]')->plaintext." : ";

                     print $data->plaintext."\n";
                 }          
 ?>