<?php

function genToken()
{
    return str_random(60);
}

function getLanguages() {
	return ["Afar","Abkhazian","Avestan","Afrikaans","Akan","Amharic","Aragonese","Arabic","Assamese","Avaric","Aymara","Azerbaijani","Bashkir","Belarusian","Bulgarian","Bihari languages","Bislama","Bambara","Bengali","Tibetan","Breton","Bosnian","Catalan; Valencian","Chechen","Chamorro","Corsican","Cree","Czech","Church Slavic; Old Slavonic; Church Slavonic; Old Bulgarian; Old Church Slavonic","Chuvash","Welsh","Danish","German","Divehi; Dhivehi; Maldivian","Dzongkha","Ewe","Greek, Modern (1453-)","English","Esperanto","Spanish; Castilian","Estonian","Basque","Persian","Fulah","Finnish","Fijian","Faroese","French","Western Frisian","Irish","Gaelic; Scottish Gaelic","Galician","Guarani","Gujarati","Manx","Hausa","Hebrew","Hindi","Hiri Motu","Croatian","Haitian; Haitian Creole","Hungarian","Armenian","Herero","Interlingua (International Auxiliary Language Association)","Indonesian","Interlingue; Occidental","Igbo","Sichuan Yi; Nuosu","Inupiaq","Ido","Icelandic","Italian","Inuktitut","Japanese","Javanese","Georgian","Kongo","Kikuyu; Gikuyu","Kuanyama; Kwanyama","Kazakh","Kalaallisut; Greenlandic","Central Khmer","Kannada","Korean","Kanuri","Kashmiri","Kurdish","Komi","Cornish","Kirghiz; Kyrgyz","Latin","Luxembourgish; Letzeburgesch","Ganda","Limburgan; Limburger; Limburgish","Lingala","Lao","Lithuanian","Luba-Katanga","Latvian","Malagasy","Marshallese","Maori","Macedonian","Malayalam","Mongolian","Marathi","Malay","Maltese","Burmese","Nauru","Bokmål, Norwegian; Norwegian Bokmål","Ndebele, North; North Ndebele","Nepali","Ndonga","Dutch; Flemish","Norwegian Nynorsk; Nynorsk, Norwegian","Norwegian","Ndebele, South; South Ndebele","Navajo; Navaho","Chichewa; Chewa; Nyanja","Occitan (post 1500); Provençal","Ojibwa","Oromo","Oriya","Ossetian; Ossetic","Panjabi; Punjabi","Pali","Polish","Pushto; Pashto","Portuguese","Quechua","Romansh","Rundi","Romanian; Moldavian; Moldovan","Russian","Kinyarwanda","Sanskrit","Sardinian","Sindhi","Northern Sami","Sango","Sinhala; Sinhalese","Slovak","Slovenian","Samoan","Shona","Somali","Albanian","Serbian","Swati","Sotho, Southern","Sundanese","Swedish","Swahili","Tamil","Telugu","Tajik","Thai","Tigrinya","Turkmen","Tagalog","Tswana","Tonga (Tonga Islands)","Turkish","Tsonga","Tatar","Twi","Tahitian","Uighur; Uyghur","Ukrainian","Urdu","Uzbek","Venda","Vietnamese","Volapük","Walloon","Wolof","Xhosa","Yiddish","Yoruba","Zhuang; Chuang","Chinese","Zulu"];
}

function getNationalities() {
	return ['Afghans','Albanians','Algerians','Americans','Andorrans','Angolans','Argentines','Armenians','Aromanians','Arubans','Australians','Austrians','Azerbaijanis','Bahamians','Bahrainis','Bangladeshis','Barbadians','Belarusians','Belgians','Belizeans','Bermudians','Boers','Bosniaks','Brazilians','Bretons','British','British Virgin Islanders','Bulgarians','Macedonian Bulgarians','Burkinabès','Burundians','Cambodians','Cameroonians','Canadians','Catalans','Cape Verdeans','Chadians','Chileans','Chinese','Colombians','Comorians','Congolese','Croatians','Cubans','Cypriots','Turkish Cypriots','Czechs','Danes','Dominicans (Republic)','Dominicans (Commonwealth)','Dutch','East Timorese','Ecuadorians','Egyptians','Emiratis','English','Eritreans','Estonians','Ethiopians','Faroese','Finns','Finnish Swedish','Fijians','Filipinos','French citizens','Georgians','Germans','Baltic Germans','Ghanaians','Gibraltar','Greeks','Greek Macedonians','Grenadians','Guatemalans','Guianese (French)','Guineans','Guinea-Bissau nationals','Guyanese','Haitians','Hondurans','Hong Kong','Hungarians','Icelanders','I-Kiribati','Indians','Indonesians','Iranians (Persians)','Iraqis','Irish','Israelis','Italians','Ivoirians','Jamaicans','Japanese','Jordanians','Kazakhs','Kenyans','Koreans','Kosovars','Kurds','Kuwaitis','Kyrgyzs','Lao','Latvians','Lebanese','Liberians','Libyans','Liechtensteiners','Lithuanians','Luxembourgers','Macedonians','Malagasy','Malaysians','Malawians','Maldivians','Malians','Maltese','Manx','Mauritians','Mexicans','Moldovans','Moroccans','Mongolians','Montenegrins','Namibians','Nepalese','New Zealanders','Nicaraguans','Nigeriens','Nigerians','Norwegians','Pakistanis','Palauans','Palestinians','Panamanians','Papua New Guineans','Paraguayans','Peruvians','Poles','Portuguese','Puerto Ricans','Quebecers','Réunionnais','Romanians','Russians','Baltic Russians','Rwandans','Salvadorans','São Tomé and Príncipe','Saudis','Scots','Senegalese','Serbs','Sierra Leoneans','Singaporeans','Sindhian','Slovaks','Slovenes','Somalis','South Africans','Spaniards','Sri Lankans','St Lucians','Sudanese','Surinamese','Swedes','Swiss','Syriacs','Syrians','Taiwanese','Tajik','Tanzanians','Thais','Tibetans','Tobagonians','Trinidadians','Tunisians','Turks','Tuvaluans','Ugandans','Ukrainians','Uruguayans','Uzbeks','Vanuatuans','Venezuelans','Vietnamese','Welsh','Yemenis','Zambians','Zimbabweans'];
}

function getDegreelevel(){
	return ['bachelor', 'master', 'ph.d', 'non_degree_program'];
}

function getCourseTerm(){
	return ['1_year', '2_years', '3_years', '4_years', '5_years', '6_years', '7_years', '8_years', '9_years', '10_years'];
}

function getEnrollment(){
	return ['january','february','march','april','may','june','july','august','september','october','november','december'];
}
function getMajorLanguage(){
	return ['Japanese', 'English', 'Japanese & English', 'Other language'];
}
