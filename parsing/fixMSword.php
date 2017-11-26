<?php
/**
 * fixMSWord
 *
 * Replace ascii chars with utf8. Note there are ascii characters that don't 
 * correctly map and will be replaced by spaces.
 *
 * @author      Robin Cafolla
 * @date        2013-03-22
 * @Copyright   (c) 2013 Robin Cafolla
 * @licence     MIT (x11) http://opensource.org/licenses/MIT
 * Modified by Zach DeCook (zjd7) to use strtr function.
 */
function fixMSWord($string) {
	$map = Array(
		chr(33) => '!', chr(34) => '"', chr(35) => '#', chr(36) => '$', chr(37) => '%', chr(38) => '&', chr(39) => "'", chr(40) => '(', chr(41) => ')', chr(42) => '*', 
		chr(43) => '+', chr(44) => ',', chr(45) => '-', chr(46) => '.', chr(47) => '/', chr(48) => '0', chr(49) => '1', chr(50) => '2', chr(51) => '3', chr(52) => '4', 
		chr(53) => '5', chr(54) => '6', chr(55) => '7', chr(56) => '8', chr(57) => '9', chr(58) => ':', chr(59) => ';', chr(60) => '<', chr(61) => '=', chr(62) => '>', 
		chr(63) => '?', chr(64) => '@', chr(65) => 'A', chr(66) => 'B', chr(67) => 'C', chr(68) => 'D', chr(69) => 'E', chr(70) => 'F', chr(71) => 'G', chr(72) => 'H', 
		chr(73) => 'I', chr(74) => 'J', chr(75) => 'K', chr(76) => 'L', chr(77) => 'M', chr(78) => 'N', chr(79) => 'O', chr(80) => 'P', chr(81) => 'Q', chr(82) => 'R', 
		chr(83) => 'S', chr(84) => 'T', chr(85) => 'U', chr(86) => 'V', chr(87) => 'W', chr(88) => 'X', chr(89) => 'Y', chr(90) => 'Z', chr(91) => '[', chr(92) => '\\', 
		chr(93) => ']', chr(94) => '^', chr(95) => '_', chr(96) => '`', chr(97) => 'a', chr(98) => 'b', chr(99) => 'c', chr(100)=> 'd', chr(101)=> 'e', chr(102)=> 'f', 
		chr(103)=> 'g', chr(104)=> 'h', chr(105)=> 'i', chr(106)=> 'j', chr(107)=> 'k', chr(108)=> 'l', chr(109)=> 'm', chr(110)=> 'n', chr(111)=> 'o', chr(112)=> 'p', 
		chr(113)=> 'q', chr(114)=> 'r', chr(115)=> 's', chr(116)=> 't', chr(117)=> 'u', chr(118)=> 'v', chr(119)=> 'w', chr(120)=> 'x', chr(121)=> 'y', chr(122)=> 'z', 
		chr(123)=> '{', chr(124)=> '|', chr(125)=> '}', chr(126)=> '~', chr(127)=> ' ', chr(128)=> '&#8364;', chr(129)=> ' ', chr(130)=> ',', chr(131)=> ' ', chr(132)=> '"', 
		chr(133)=> '.', chr(134)=> ' ', chr(135)=> ' ', chr(136)=> '^', chr(137)=> ' ', chr(138)=> ' ', chr(139)=> '<', chr(140)=> ' ', chr(141)=> ' ', chr(142)=> ' ', 
		chr(143)=> ' ', chr(144)=> ' ', chr(145)=> "'", chr(146)=> "'", chr(147)=> '"', chr(148)=> '"', chr(149)=> '.', chr(150)=> '-', chr(151)=> '-', chr(152)=> '~', 
		chr(153)=> ' ', chr(154)=> ' ', chr(155)=> '>', chr(156)=> ' ', chr(157)=> ' ', chr(158)=> ' ', chr(159)=> ' ', chr(160)=> ' ', chr(161)=> '¡', chr(162)=> '¢', 
		chr(163)=> '£', chr(164)=> '¤', chr(165)=> '¥', chr(166)=> '¦', chr(167)=> '§', chr(168)=> '¨', chr(169)=> '©', chr(170)=> 'ª', chr(171)=> '«', chr(172)=> '¬', 
		chr(173)=> '­',  chr(174)=> '®', chr(175)=> '¯', chr(176)=> '°', chr(177)=> '±', chr(178)=> '²', chr(179)=> '³', chr(180)=> '´', chr(181)=> 'µ', chr(182)=> '¶', 
		chr(183)=> '·', chr(184)=> '¸', chr(185)=> '¹', chr(186)=> 'º', chr(187)=> '»', chr(188)=> '¼', chr(189)=> '½', chr(190)=> '¾', chr(191)=> '¿', chr(192)=> 'À', 
		chr(193)=> 'Á', chr(194)=> 'Â', chr(195)=> 'Ã', chr(196)=> 'Ä', chr(197)=> 'Å', chr(198)=> 'Æ', chr(199)=> 'Ç', chr(200)=> 'È', chr(201)=> 'É', chr(202)=> 'Ê', 
		chr(203)=> 'Ë', chr(204)=> 'Ì', chr(205)=> 'Í', chr(206)=> 'Î', chr(207)=> 'Ï', chr(208)=> 'Ð', chr(209)=> 'Ñ', chr(210)=> 'Ò', chr(211)=> 'Ó', chr(212)=> 'Ô', 
		chr(213)=> 'Õ', chr(214)=> 'Ö', chr(215)=> '×', chr(216)=> 'Ø', chr(217)=> 'Ù', chr(218)=> 'Ú', chr(219)=> 'Û', chr(220)=> 'Ü', chr(221)=> 'Ý', chr(222)=> 'Þ', 
		chr(223)=> 'ß', chr(224)=> 'à', chr(225)=> 'á', chr(226)=> 'â', chr(227)=> 'ã', chr(228)=> 'ä', chr(229)=> 'å', chr(230)=> 'æ', chr(231)=> 'ç', chr(232)=> 'è', 
		chr(233)=> 'é', chr(234)=> 'ê', chr(235)=> 'ë', chr(236)=> 'ì', chr(237)=> 'í', chr(238)=> 'î', chr(239)=> 'ï', chr(240)=> 'ð', chr(241)=> 'ñ', chr(242)=> 'ò', 
		chr(243)=> 'ó', chr(244)=> 'ô', chr(245)=> 'õ', chr(246)=> 'ö', chr(247)=> '÷', chr(248)=> 'ø', chr(249)=> 'ù', chr(250)=> 'ú', chr(251)=> 'û', chr(252)=> 'ü', 
		chr(253)=> 'ý', chr(254)=> 'þ', chr(255)=> 'ÿ'
	);
	return strtr( $string, $map );
}