



<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
 
 <meta name="ROBOTS" content="NOARCHIVE">
 
 <link rel="icon" type="image/vnd.microsoft.icon" href="http://www.gstatic.com/codesite/ph/images/phosting.ico">
 
 
 <script type="text/javascript">
 
 
 
 
 var codesite_token = "uEF1Jv_VzL7TYQY41miDd4g5PfU:1347763369624";
 
 
 var CS_env = {"profileUrl":["/u/108117439965498251840/"],"token":"uEF1Jv_VzL7TYQY41miDd4g5PfU:1347763369624","assetHostPath":"http://www.gstatic.com/codesite/ph","domainName":null,"assetVersionPath":"http://www.gstatic.com/codesite/ph/16186173366037945081","projectHomeUrl":"/p/datejs","relativeBaseUrl":"","projectName":"datejs","loggedInUserEmail":"toconuts@gmail.com"};
 var _gaq = _gaq || [];
 _gaq.push(
 ['siteTracker._setAccount', 'UA-18071-1'],
 ['siteTracker._trackPageview']);
 
 _gaq.push(
 ['projectTracker._setAccount', 'UA-2699273-4'],
 ['projectTracker._trackPageview']);
 
 (function() {
 var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
 ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
 (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);
 })();
 
 </script>
 
 
 <title>extras.js - 
 datejs -
 
 
 A JavaScript Date Library - Google Project Hosting
 </title>
 <link type="text/css" rel="stylesheet" href="http://www.gstatic.com/codesite/ph/16186173366037945081/css/core.css">
 
 <link type="text/css" rel="stylesheet" href="http://www.gstatic.com/codesite/ph/16186173366037945081/css/ph_detail.css" >
 
 
 <link type="text/css" rel="stylesheet" href="http://www.gstatic.com/codesite/ph/16186173366037945081/css/d_sb.css" >
 
 
 
<!--[if IE]>
 <link type="text/css" rel="stylesheet" href="http://www.gstatic.com/codesite/ph/16186173366037945081/css/d_ie.css" >
<![endif]-->
 <style type="text/css">
 .menuIcon.off { background: no-repeat url(http://www.gstatic.com/codesite/ph/images/dropdown_sprite.gif) 0 -42px }
 .menuIcon.on { background: no-repeat url(http://www.gstatic.com/codesite/ph/images/dropdown_sprite.gif) 0 -28px }
 .menuIcon.down { background: no-repeat url(http://www.gstatic.com/codesite/ph/images/dropdown_sprite.gif) 0 0; }
 
 
 
  tr.inline_comment {
 background: #fff;
 vertical-align: top;
 }
 div.draft, div.published {
 padding: .3em;
 border: 1px solid #999; 
 margin-bottom: .1em;
 font-family: arial, sans-serif;
 max-width: 60em;
 }
 div.draft {
 background: #ffa;
 } 
 div.published {
 background: #e5ecf9;
 }
 div.published .body, div.draft .body {
 padding: .5em .1em .1em .1em;
 max-width: 60em;
 white-space: pre-wrap;
 white-space: -moz-pre-wrap;
 white-space: -pre-wrap;
 white-space: -o-pre-wrap;
 word-wrap: break-word;
 font-size: 1em;
 }
 div.draft .actions {
 margin-left: 1em;
 font-size: 90%;
 }
 div.draft form {
 padding: .5em .5em .5em 0;
 }
 div.draft textarea, div.published textarea {
 width: 95%;
 height: 10em;
 font-family: arial, sans-serif;
 margin-bottom: .5em;
 }

 
 .nocursor, .nocursor td, .cursor_hidden, .cursor_hidden td {
 background-color: white;
 height: 2px;
 }
 .cursor, .cursor td {
 background-color: darkblue;
 height: 2px;
 display: '';
 }
 
 
.list {
 border: 1px solid white;
 border-bottom: 0;
}

 
 </style>
</head>
<body class="t4">
<script type="text/javascript">
 window.___gcfg = {lang: 'en'};
 (function() 
 {var po = document.createElement("script");
 po.type = "text/javascript"; po.async = true;po.src = "https://apis.google.com/js/plusone.js";
 var s = document.getElementsByTagName("script")[0];
 s.parentNode.insertBefore(po, s);
 })();
</script>
<div class="headbg">

 <div id="gaia">
 

 <span>
 
 
 
 <b>toconuts@gmail.com</b>
 
 
 | <a href="/u/108117439965498251840/" id="projects-dropdown" onclick="return false;"
 ><u>My favorites</u> <small>&#9660;</small></a>
 | <a href="/u/108117439965498251840/" onclick="_CS_click('/gb/ph/profile');"
 title="Profile, Updates, and Settings"
 ><u>Profile</u></a>
 | <a href="https://www.google.com/accounts/Logout?continue=http%3A%2F%2Fcode.google.com%2Fp%2Fdatejs%2Fsource%2Fbrowse%2Ftrunk%2Fsrc%2Fextras.js" 
 onclick="_CS_click('/gb/ph/signout');"
 ><u>Sign out</u></a>
 
 </span>

 </div>

 <div class="gbh" style="left: 0pt;"></div>
 <div class="gbh" style="right: 0pt;"></div>
 
 
 <div style="height: 1px"></div>
<!--[if lte IE 7]>
<div style="text-align:center;">
Your version of Internet Explorer is not supported. Try a browser that
contributes to open source, such as <a href="http://www.firefox.com">Firefox</a>,
<a href="http://www.google.com/chrome">Google Chrome</a>, or
<a href="http://code.google.com/chrome/chromeframe/">Google Chrome Frame</a>.
</div>
<![endif]-->



 <table style="padding:0px; margin: 0px 0px 10px 0px; width:100%" cellpadding="0" cellspacing="0"
 itemscope itemtype="http://schema.org/CreativeWork">
 <tr style="height: 58px;">
 
 
 
 <td id="plogo">
 <link itemprop="url" href="/p/datejs">
 <a href="/p/datejs/">
 
 
 <img src="/p/datejs/logo?cct=1330372383"
 alt="Logo" itemprop="image">
 
 </a>
 </td>
 
 <td style="padding-left: 0.5em">
 
 <div id="pname">
 <a href="/p/datejs/"><span itemprop="name">datejs</span></a>
 </div>
 
 <div id="psum">
 <a id="project_summary_link"
 href="/p/datejs/"><span itemprop="description">A JavaScript Date Library</span></a>
 
 </div>
 
 
 </td>
 <td style="white-space:nowrap;text-align:right; vertical-align:bottom;">
 
 <form action="/hosting/search">
 <input size="30" name="q" value="" type="text">
 
 <input type="submit" name="projectsearch" value="Search projects" >
 </form>
 
 </tr>
 </table>

</div>

 
<div id="mt" class="gtb"> 
 <a href="/p/datejs/" class="tab ">Project&nbsp;Home</a>
 
 
 
 
 <a href="/p/datejs/downloads/list" class="tab ">Downloads</a>
 
 
 
 
 
 <a href="/p/datejs/w/list" class="tab ">Wiki</a>
 
 
 
 
 
 <a href="/p/datejs/issues/list"
 class="tab ">Issues</a>
 
 
 
 
 
 <a href="/p/datejs/source/checkout"
 class="tab active">Source</a>
 
 
 
 
 
 
 
 <div class=gtbc></div>
</div>
<table cellspacing="0" cellpadding="0" width="100%" align="center" border="0" class="st">
 <tr>
 
 
 
 
 
 
 
 <td class="subt">
 <div class="st2">
 <div class="isf">
 
 


 <span class="inst1"><a href="/p/datejs/source/checkout">Checkout</a></span> &nbsp;
 <span class="inst2"><a href="/p/datejs/source/browse/">Browse</a></span> &nbsp;
 <span class="inst3"><a href="/p/datejs/source/list">Changes</a></span> &nbsp;
 
 &nbsp;
 
 
 <form action="/p/datejs/source/search" method="get" style="display:inline"
 onsubmit="document.getElementById('codesearchq').value = document.getElementById('origq').value">
 <input type="hidden" name="q" id="codesearchq" value="">
 <input type="text" maxlength="2048" size="38" id="origq" name="origq" value="" title="Google Code Search" style="font-size:92%">&nbsp;<input type="submit" value="Search Trunk" name="btnG" style="font-size:92%">
 
 
 
 
 
 
 </form>
 <script type="text/javascript">
 
 function codesearchQuery(form) {
 var query = document.getElementById('q').value;
 if (query) { form.action += '%20' + query; }
 }
 </script>
 </div>
</div>

 </td>
 
 
 
 <td align="right" valign="top" class="bevel-right"></td>
 </tr>
</table>


<script type="text/javascript">
 var cancelBubble = false;
 function _go(url) { document.location = url; }
</script>
<div id="maincol"
 
>

 
<!-- IE -->




<div class="expand">
<div id="colcontrol">
<style type="text/css">
 #file_flipper { white-space: nowrap; padding-right: 2em; }
 #file_flipper.hidden { display: none; }
 #file_flipper .pagelink { color: #0000CC; text-decoration: underline; }
 #file_flipper #visiblefiles { padding-left: 0.5em; padding-right: 0.5em; }
</style>
<table id="nav_and_rev" class="list"
 cellpadding="0" cellspacing="0" width="100%">
 <tr>
 
 <td nowrap="nowrap" class="src_crumbs src_nav" width="33%">
 <strong class="src_nav">Source path:&nbsp;</strong>
 <span id="crumb_root">
 
 <a href="/p/datejs/source/browse/">svn</a>/&nbsp;</span>
 <span id="crumb_links" class="ifClosed"><a href="/p/datejs/source/browse/trunk/">trunk</a><span class="sp">/&nbsp;</span><a href="/p/datejs/source/browse/trunk/src/">src</a><span class="sp">/&nbsp;</span>extras.js</span>
 
 

 </td>
 
 
 <td nowrap="nowrap" width="33%" align="center">
 <a href="/p/datejs/source/browse/trunk/src/extras.js?edit=1"
 ><img src="http://www.gstatic.com/codesite/ph/images/pencil-y14.png"
 class="edit_icon">Edit file</a>
 </td>
 
 
 <td nowrap="nowrap" width="33%" align="right">
 <table cellpadding="0" cellspacing="0" style="font-size: 100%"><tr>
 
 
 <td class="flipper">
 <ul class="leftside">
 
 <li><a href="/p/datejs/source/browse/trunk/src/extras.js?r=162" title="Previous">&lsaquo;r162</a></li>
 
 </ul>
 </td>
 
 <td class="flipper"><b>r197</b></td>
 
 </tr></table>
 </td> 
 </tr>
</table>

<div class="fc">
 
 
 
<style type="text/css">
.undermouse span {
 background-image: url(http://www.gstatic.com/codesite/ph/images/comments.gif); }
</style>
<table class="opened" id="review_comment_area"
><tr>
<td id="nums">
<pre><table width="100%"><tr class="nocursor"><td></td></tr></table></pre>
<pre><table width="100%" id="nums_table_0"><tr id="gr_svn197_1"

><td id="1"><a href="#1">1</a></td></tr
><tr id="gr_svn197_2"

><td id="2"><a href="#2">2</a></td></tr
><tr id="gr_svn197_3"

><td id="3"><a href="#3">3</a></td></tr
><tr id="gr_svn197_4"

><td id="4"><a href="#4">4</a></td></tr
><tr id="gr_svn197_5"

><td id="5"><a href="#5">5</a></td></tr
><tr id="gr_svn197_6"

><td id="6"><a href="#6">6</a></td></tr
><tr id="gr_svn197_7"

><td id="7"><a href="#7">7</a></td></tr
><tr id="gr_svn197_8"

><td id="8"><a href="#8">8</a></td></tr
><tr id="gr_svn197_9"

><td id="9"><a href="#9">9</a></td></tr
><tr id="gr_svn197_10"

><td id="10"><a href="#10">10</a></td></tr
><tr id="gr_svn197_11"

><td id="11"><a href="#11">11</a></td></tr
><tr id="gr_svn197_12"

><td id="12"><a href="#12">12</a></td></tr
><tr id="gr_svn197_13"

><td id="13"><a href="#13">13</a></td></tr
><tr id="gr_svn197_14"

><td id="14"><a href="#14">14</a></td></tr
><tr id="gr_svn197_15"

><td id="15"><a href="#15">15</a></td></tr
><tr id="gr_svn197_16"

><td id="16"><a href="#16">16</a></td></tr
><tr id="gr_svn197_17"

><td id="17"><a href="#17">17</a></td></tr
><tr id="gr_svn197_18"

><td id="18"><a href="#18">18</a></td></tr
><tr id="gr_svn197_19"

><td id="19"><a href="#19">19</a></td></tr
><tr id="gr_svn197_20"

><td id="20"><a href="#20">20</a></td></tr
><tr id="gr_svn197_21"

><td id="21"><a href="#21">21</a></td></tr
><tr id="gr_svn197_22"

><td id="22"><a href="#22">22</a></td></tr
><tr id="gr_svn197_23"

><td id="23"><a href="#23">23</a></td></tr
><tr id="gr_svn197_24"

><td id="24"><a href="#24">24</a></td></tr
><tr id="gr_svn197_25"

><td id="25"><a href="#25">25</a></td></tr
><tr id="gr_svn197_26"

><td id="26"><a href="#26">26</a></td></tr
><tr id="gr_svn197_27"

><td id="27"><a href="#27">27</a></td></tr
><tr id="gr_svn197_28"

><td id="28"><a href="#28">28</a></td></tr
><tr id="gr_svn197_29"

><td id="29"><a href="#29">29</a></td></tr
><tr id="gr_svn197_30"

><td id="30"><a href="#30">30</a></td></tr
><tr id="gr_svn197_31"

><td id="31"><a href="#31">31</a></td></tr
><tr id="gr_svn197_32"

><td id="32"><a href="#32">32</a></td></tr
><tr id="gr_svn197_33"

><td id="33"><a href="#33">33</a></td></tr
><tr id="gr_svn197_34"

><td id="34"><a href="#34">34</a></td></tr
><tr id="gr_svn197_35"

><td id="35"><a href="#35">35</a></td></tr
><tr id="gr_svn197_36"

><td id="36"><a href="#36">36</a></td></tr
><tr id="gr_svn197_37"

><td id="37"><a href="#37">37</a></td></tr
><tr id="gr_svn197_38"

><td id="38"><a href="#38">38</a></td></tr
><tr id="gr_svn197_39"

><td id="39"><a href="#39">39</a></td></tr
><tr id="gr_svn197_40"

><td id="40"><a href="#40">40</a></td></tr
><tr id="gr_svn197_41"

><td id="41"><a href="#41">41</a></td></tr
><tr id="gr_svn197_42"

><td id="42"><a href="#42">42</a></td></tr
><tr id="gr_svn197_43"

><td id="43"><a href="#43">43</a></td></tr
><tr id="gr_svn197_44"

><td id="44"><a href="#44">44</a></td></tr
><tr id="gr_svn197_45"

><td id="45"><a href="#45">45</a></td></tr
><tr id="gr_svn197_46"

><td id="46"><a href="#46">46</a></td></tr
><tr id="gr_svn197_47"

><td id="47"><a href="#47">47</a></td></tr
><tr id="gr_svn197_48"

><td id="48"><a href="#48">48</a></td></tr
><tr id="gr_svn197_49"

><td id="49"><a href="#49">49</a></td></tr
><tr id="gr_svn197_50"

><td id="50"><a href="#50">50</a></td></tr
><tr id="gr_svn197_51"

><td id="51"><a href="#51">51</a></td></tr
><tr id="gr_svn197_52"

><td id="52"><a href="#52">52</a></td></tr
><tr id="gr_svn197_53"

><td id="53"><a href="#53">53</a></td></tr
><tr id="gr_svn197_54"

><td id="54"><a href="#54">54</a></td></tr
><tr id="gr_svn197_55"

><td id="55"><a href="#55">55</a></td></tr
><tr id="gr_svn197_56"

><td id="56"><a href="#56">56</a></td></tr
><tr id="gr_svn197_57"

><td id="57"><a href="#57">57</a></td></tr
><tr id="gr_svn197_58"

><td id="58"><a href="#58">58</a></td></tr
><tr id="gr_svn197_59"

><td id="59"><a href="#59">59</a></td></tr
><tr id="gr_svn197_60"

><td id="60"><a href="#60">60</a></td></tr
><tr id="gr_svn197_61"

><td id="61"><a href="#61">61</a></td></tr
><tr id="gr_svn197_62"

><td id="62"><a href="#62">62</a></td></tr
><tr id="gr_svn197_63"

><td id="63"><a href="#63">63</a></td></tr
><tr id="gr_svn197_64"

><td id="64"><a href="#64">64</a></td></tr
><tr id="gr_svn197_65"

><td id="65"><a href="#65">65</a></td></tr
><tr id="gr_svn197_66"

><td id="66"><a href="#66">66</a></td></tr
><tr id="gr_svn197_67"

><td id="67"><a href="#67">67</a></td></tr
><tr id="gr_svn197_68"

><td id="68"><a href="#68">68</a></td></tr
><tr id="gr_svn197_69"

><td id="69"><a href="#69">69</a></td></tr
><tr id="gr_svn197_70"

><td id="70"><a href="#70">70</a></td></tr
><tr id="gr_svn197_71"

><td id="71"><a href="#71">71</a></td></tr
><tr id="gr_svn197_72"

><td id="72"><a href="#72">72</a></td></tr
><tr id="gr_svn197_73"

><td id="73"><a href="#73">73</a></td></tr
><tr id="gr_svn197_74"

><td id="74"><a href="#74">74</a></td></tr
><tr id="gr_svn197_75"

><td id="75"><a href="#75">75</a></td></tr
><tr id="gr_svn197_76"

><td id="76"><a href="#76">76</a></td></tr
><tr id="gr_svn197_77"

><td id="77"><a href="#77">77</a></td></tr
><tr id="gr_svn197_78"

><td id="78"><a href="#78">78</a></td></tr
><tr id="gr_svn197_79"

><td id="79"><a href="#79">79</a></td></tr
><tr id="gr_svn197_80"

><td id="80"><a href="#80">80</a></td></tr
><tr id="gr_svn197_81"

><td id="81"><a href="#81">81</a></td></tr
><tr id="gr_svn197_82"

><td id="82"><a href="#82">82</a></td></tr
><tr id="gr_svn197_83"

><td id="83"><a href="#83">83</a></td></tr
><tr id="gr_svn197_84"

><td id="84"><a href="#84">84</a></td></tr
><tr id="gr_svn197_85"

><td id="85"><a href="#85">85</a></td></tr
><tr id="gr_svn197_86"

><td id="86"><a href="#86">86</a></td></tr
><tr id="gr_svn197_87"

><td id="87"><a href="#87">87</a></td></tr
><tr id="gr_svn197_88"

><td id="88"><a href="#88">88</a></td></tr
><tr id="gr_svn197_89"

><td id="89"><a href="#89">89</a></td></tr
><tr id="gr_svn197_90"

><td id="90"><a href="#90">90</a></td></tr
><tr id="gr_svn197_91"

><td id="91"><a href="#91">91</a></td></tr
><tr id="gr_svn197_92"

><td id="92"><a href="#92">92</a></td></tr
><tr id="gr_svn197_93"

><td id="93"><a href="#93">93</a></td></tr
><tr id="gr_svn197_94"

><td id="94"><a href="#94">94</a></td></tr
><tr id="gr_svn197_95"

><td id="95"><a href="#95">95</a></td></tr
><tr id="gr_svn197_96"

><td id="96"><a href="#96">96</a></td></tr
><tr id="gr_svn197_97"

><td id="97"><a href="#97">97</a></td></tr
><tr id="gr_svn197_98"

><td id="98"><a href="#98">98</a></td></tr
><tr id="gr_svn197_99"

><td id="99"><a href="#99">99</a></td></tr
><tr id="gr_svn197_100"

><td id="100"><a href="#100">100</a></td></tr
><tr id="gr_svn197_101"

><td id="101"><a href="#101">101</a></td></tr
><tr id="gr_svn197_102"

><td id="102"><a href="#102">102</a></td></tr
><tr id="gr_svn197_103"

><td id="103"><a href="#103">103</a></td></tr
><tr id="gr_svn197_104"

><td id="104"><a href="#104">104</a></td></tr
><tr id="gr_svn197_105"

><td id="105"><a href="#105">105</a></td></tr
><tr id="gr_svn197_106"

><td id="106"><a href="#106">106</a></td></tr
><tr id="gr_svn197_107"

><td id="107"><a href="#107">107</a></td></tr
><tr id="gr_svn197_108"

><td id="108"><a href="#108">108</a></td></tr
><tr id="gr_svn197_109"

><td id="109"><a href="#109">109</a></td></tr
><tr id="gr_svn197_110"

><td id="110"><a href="#110">110</a></td></tr
><tr id="gr_svn197_111"

><td id="111"><a href="#111">111</a></td></tr
><tr id="gr_svn197_112"

><td id="112"><a href="#112">112</a></td></tr
><tr id="gr_svn197_113"

><td id="113"><a href="#113">113</a></td></tr
><tr id="gr_svn197_114"

><td id="114"><a href="#114">114</a></td></tr
><tr id="gr_svn197_115"

><td id="115"><a href="#115">115</a></td></tr
><tr id="gr_svn197_116"

><td id="116"><a href="#116">116</a></td></tr
><tr id="gr_svn197_117"

><td id="117"><a href="#117">117</a></td></tr
><tr id="gr_svn197_118"

><td id="118"><a href="#118">118</a></td></tr
><tr id="gr_svn197_119"

><td id="119"><a href="#119">119</a></td></tr
><tr id="gr_svn197_120"

><td id="120"><a href="#120">120</a></td></tr
><tr id="gr_svn197_121"

><td id="121"><a href="#121">121</a></td></tr
><tr id="gr_svn197_122"

><td id="122"><a href="#122">122</a></td></tr
><tr id="gr_svn197_123"

><td id="123"><a href="#123">123</a></td></tr
><tr id="gr_svn197_124"

><td id="124"><a href="#124">124</a></td></tr
><tr id="gr_svn197_125"

><td id="125"><a href="#125">125</a></td></tr
><tr id="gr_svn197_126"

><td id="126"><a href="#126">126</a></td></tr
><tr id="gr_svn197_127"

><td id="127"><a href="#127">127</a></td></tr
><tr id="gr_svn197_128"

><td id="128"><a href="#128">128</a></td></tr
><tr id="gr_svn197_129"

><td id="129"><a href="#129">129</a></td></tr
><tr id="gr_svn197_130"

><td id="130"><a href="#130">130</a></td></tr
><tr id="gr_svn197_131"

><td id="131"><a href="#131">131</a></td></tr
><tr id="gr_svn197_132"

><td id="132"><a href="#132">132</a></td></tr
><tr id="gr_svn197_133"

><td id="133"><a href="#133">133</a></td></tr
><tr id="gr_svn197_134"

><td id="134"><a href="#134">134</a></td></tr
><tr id="gr_svn197_135"

><td id="135"><a href="#135">135</a></td></tr
><tr id="gr_svn197_136"

><td id="136"><a href="#136">136</a></td></tr
><tr id="gr_svn197_137"

><td id="137"><a href="#137">137</a></td></tr
><tr id="gr_svn197_138"

><td id="138"><a href="#138">138</a></td></tr
><tr id="gr_svn197_139"

><td id="139"><a href="#139">139</a></td></tr
><tr id="gr_svn197_140"

><td id="140"><a href="#140">140</a></td></tr
><tr id="gr_svn197_141"

><td id="141"><a href="#141">141</a></td></tr
><tr id="gr_svn197_142"

><td id="142"><a href="#142">142</a></td></tr
><tr id="gr_svn197_143"

><td id="143"><a href="#143">143</a></td></tr
><tr id="gr_svn197_144"

><td id="144"><a href="#144">144</a></td></tr
><tr id="gr_svn197_145"

><td id="145"><a href="#145">145</a></td></tr
><tr id="gr_svn197_146"

><td id="146"><a href="#146">146</a></td></tr
><tr id="gr_svn197_147"

><td id="147"><a href="#147">147</a></td></tr
><tr id="gr_svn197_148"

><td id="148"><a href="#148">148</a></td></tr
><tr id="gr_svn197_149"

><td id="149"><a href="#149">149</a></td></tr
><tr id="gr_svn197_150"

><td id="150"><a href="#150">150</a></td></tr
><tr id="gr_svn197_151"

><td id="151"><a href="#151">151</a></td></tr
><tr id="gr_svn197_152"

><td id="152"><a href="#152">152</a></td></tr
><tr id="gr_svn197_153"

><td id="153"><a href="#153">153</a></td></tr
><tr id="gr_svn197_154"

><td id="154"><a href="#154">154</a></td></tr
><tr id="gr_svn197_155"

><td id="155"><a href="#155">155</a></td></tr
><tr id="gr_svn197_156"

><td id="156"><a href="#156">156</a></td></tr
><tr id="gr_svn197_157"

><td id="157"><a href="#157">157</a></td></tr
><tr id="gr_svn197_158"

><td id="158"><a href="#158">158</a></td></tr
><tr id="gr_svn197_159"

><td id="159"><a href="#159">159</a></td></tr
><tr id="gr_svn197_160"

><td id="160"><a href="#160">160</a></td></tr
><tr id="gr_svn197_161"

><td id="161"><a href="#161">161</a></td></tr
><tr id="gr_svn197_162"

><td id="162"><a href="#162">162</a></td></tr
><tr id="gr_svn197_163"

><td id="163"><a href="#163">163</a></td></tr
><tr id="gr_svn197_164"

><td id="164"><a href="#164">164</a></td></tr
><tr id="gr_svn197_165"

><td id="165"><a href="#165">165</a></td></tr
><tr id="gr_svn197_166"

><td id="166"><a href="#166">166</a></td></tr
><tr id="gr_svn197_167"

><td id="167"><a href="#167">167</a></td></tr
><tr id="gr_svn197_168"

><td id="168"><a href="#168">168</a></td></tr
><tr id="gr_svn197_169"

><td id="169"><a href="#169">169</a></td></tr
><tr id="gr_svn197_170"

><td id="170"><a href="#170">170</a></td></tr
><tr id="gr_svn197_171"

><td id="171"><a href="#171">171</a></td></tr
><tr id="gr_svn197_172"

><td id="172"><a href="#172">172</a></td></tr
><tr id="gr_svn197_173"

><td id="173"><a href="#173">173</a></td></tr
><tr id="gr_svn197_174"

><td id="174"><a href="#174">174</a></td></tr
><tr id="gr_svn197_175"

><td id="175"><a href="#175">175</a></td></tr
><tr id="gr_svn197_176"

><td id="176"><a href="#176">176</a></td></tr
><tr id="gr_svn197_177"

><td id="177"><a href="#177">177</a></td></tr
><tr id="gr_svn197_178"

><td id="178"><a href="#178">178</a></td></tr
><tr id="gr_svn197_179"

><td id="179"><a href="#179">179</a></td></tr
><tr id="gr_svn197_180"

><td id="180"><a href="#180">180</a></td></tr
><tr id="gr_svn197_181"

><td id="181"><a href="#181">181</a></td></tr
><tr id="gr_svn197_182"

><td id="182"><a href="#182">182</a></td></tr
><tr id="gr_svn197_183"

><td id="183"><a href="#183">183</a></td></tr
><tr id="gr_svn197_184"

><td id="184"><a href="#184">184</a></td></tr
><tr id="gr_svn197_185"

><td id="185"><a href="#185">185</a></td></tr
><tr id="gr_svn197_186"

><td id="186"><a href="#186">186</a></td></tr
><tr id="gr_svn197_187"

><td id="187"><a href="#187">187</a></td></tr
><tr id="gr_svn197_188"

><td id="188"><a href="#188">188</a></td></tr
><tr id="gr_svn197_189"

><td id="189"><a href="#189">189</a></td></tr
><tr id="gr_svn197_190"

><td id="190"><a href="#190">190</a></td></tr
><tr id="gr_svn197_191"

><td id="191"><a href="#191">191</a></td></tr
><tr id="gr_svn197_192"

><td id="192"><a href="#192">192</a></td></tr
><tr id="gr_svn197_193"

><td id="193"><a href="#193">193</a></td></tr
><tr id="gr_svn197_194"

><td id="194"><a href="#194">194</a></td></tr
><tr id="gr_svn197_195"

><td id="195"><a href="#195">195</a></td></tr
><tr id="gr_svn197_196"

><td id="196"><a href="#196">196</a></td></tr
><tr id="gr_svn197_197"

><td id="197"><a href="#197">197</a></td></tr
><tr id="gr_svn197_198"

><td id="198"><a href="#198">198</a></td></tr
><tr id="gr_svn197_199"

><td id="199"><a href="#199">199</a></td></tr
><tr id="gr_svn197_200"

><td id="200"><a href="#200">200</a></td></tr
><tr id="gr_svn197_201"

><td id="201"><a href="#201">201</a></td></tr
><tr id="gr_svn197_202"

><td id="202"><a href="#202">202</a></td></tr
><tr id="gr_svn197_203"

><td id="203"><a href="#203">203</a></td></tr
><tr id="gr_svn197_204"

><td id="204"><a href="#204">204</a></td></tr
><tr id="gr_svn197_205"

><td id="205"><a href="#205">205</a></td></tr
><tr id="gr_svn197_206"

><td id="206"><a href="#206">206</a></td></tr
><tr id="gr_svn197_207"

><td id="207"><a href="#207">207</a></td></tr
><tr id="gr_svn197_208"

><td id="208"><a href="#208">208</a></td></tr
><tr id="gr_svn197_209"

><td id="209"><a href="#209">209</a></td></tr
><tr id="gr_svn197_210"

><td id="210"><a href="#210">210</a></td></tr
><tr id="gr_svn197_211"

><td id="211"><a href="#211">211</a></td></tr
><tr id="gr_svn197_212"

><td id="212"><a href="#212">212</a></td></tr
><tr id="gr_svn197_213"

><td id="213"><a href="#213">213</a></td></tr
><tr id="gr_svn197_214"

><td id="214"><a href="#214">214</a></td></tr
><tr id="gr_svn197_215"

><td id="215"><a href="#215">215</a></td></tr
><tr id="gr_svn197_216"

><td id="216"><a href="#216">216</a></td></tr
><tr id="gr_svn197_217"

><td id="217"><a href="#217">217</a></td></tr
><tr id="gr_svn197_218"

><td id="218"><a href="#218">218</a></td></tr
><tr id="gr_svn197_219"

><td id="219"><a href="#219">219</a></td></tr
><tr id="gr_svn197_220"

><td id="220"><a href="#220">220</a></td></tr
><tr id="gr_svn197_221"

><td id="221"><a href="#221">221</a></td></tr
><tr id="gr_svn197_222"

><td id="222"><a href="#222">222</a></td></tr
><tr id="gr_svn197_223"

><td id="223"><a href="#223">223</a></td></tr
><tr id="gr_svn197_224"

><td id="224"><a href="#224">224</a></td></tr
><tr id="gr_svn197_225"

><td id="225"><a href="#225">225</a></td></tr
><tr id="gr_svn197_226"

><td id="226"><a href="#226">226</a></td></tr
><tr id="gr_svn197_227"

><td id="227"><a href="#227">227</a></td></tr
><tr id="gr_svn197_228"

><td id="228"><a href="#228">228</a></td></tr
><tr id="gr_svn197_229"

><td id="229"><a href="#229">229</a></td></tr
><tr id="gr_svn197_230"

><td id="230"><a href="#230">230</a></td></tr
><tr id="gr_svn197_231"

><td id="231"><a href="#231">231</a></td></tr
><tr id="gr_svn197_232"

><td id="232"><a href="#232">232</a></td></tr
><tr id="gr_svn197_233"

><td id="233"><a href="#233">233</a></td></tr
><tr id="gr_svn197_234"

><td id="234"><a href="#234">234</a></td></tr
><tr id="gr_svn197_235"

><td id="235"><a href="#235">235</a></td></tr
><tr id="gr_svn197_236"

><td id="236"><a href="#236">236</a></td></tr
><tr id="gr_svn197_237"

><td id="237"><a href="#237">237</a></td></tr
><tr id="gr_svn197_238"

><td id="238"><a href="#238">238</a></td></tr
><tr id="gr_svn197_239"

><td id="239"><a href="#239">239</a></td></tr
><tr id="gr_svn197_240"

><td id="240"><a href="#240">240</a></td></tr
><tr id="gr_svn197_241"

><td id="241"><a href="#241">241</a></td></tr
><tr id="gr_svn197_242"

><td id="242"><a href="#242">242</a></td></tr
><tr id="gr_svn197_243"

><td id="243"><a href="#243">243</a></td></tr
><tr id="gr_svn197_244"

><td id="244"><a href="#244">244</a></td></tr
><tr id="gr_svn197_245"

><td id="245"><a href="#245">245</a></td></tr
><tr id="gr_svn197_246"

><td id="246"><a href="#246">246</a></td></tr
><tr id="gr_svn197_247"

><td id="247"><a href="#247">247</a></td></tr
><tr id="gr_svn197_248"

><td id="248"><a href="#248">248</a></td></tr
><tr id="gr_svn197_249"

><td id="249"><a href="#249">249</a></td></tr
><tr id="gr_svn197_250"

><td id="250"><a href="#250">250</a></td></tr
><tr id="gr_svn197_251"

><td id="251"><a href="#251">251</a></td></tr
><tr id="gr_svn197_252"

><td id="252"><a href="#252">252</a></td></tr
><tr id="gr_svn197_253"

><td id="253"><a href="#253">253</a></td></tr
><tr id="gr_svn197_254"

><td id="254"><a href="#254">254</a></td></tr
><tr id="gr_svn197_255"

><td id="255"><a href="#255">255</a></td></tr
><tr id="gr_svn197_256"

><td id="256"><a href="#256">256</a></td></tr
><tr id="gr_svn197_257"

><td id="257"><a href="#257">257</a></td></tr
><tr id="gr_svn197_258"

><td id="258"><a href="#258">258</a></td></tr
><tr id="gr_svn197_259"

><td id="259"><a href="#259">259</a></td></tr
><tr id="gr_svn197_260"

><td id="260"><a href="#260">260</a></td></tr
><tr id="gr_svn197_261"

><td id="261"><a href="#261">261</a></td></tr
><tr id="gr_svn197_262"

><td id="262"><a href="#262">262</a></td></tr
><tr id="gr_svn197_263"

><td id="263"><a href="#263">263</a></td></tr
><tr id="gr_svn197_264"

><td id="264"><a href="#264">264</a></td></tr
><tr id="gr_svn197_265"

><td id="265"><a href="#265">265</a></td></tr
><tr id="gr_svn197_266"

><td id="266"><a href="#266">266</a></td></tr
><tr id="gr_svn197_267"

><td id="267"><a href="#267">267</a></td></tr
><tr id="gr_svn197_268"

><td id="268"><a href="#268">268</a></td></tr
><tr id="gr_svn197_269"

><td id="269"><a href="#269">269</a></td></tr
><tr id="gr_svn197_270"

><td id="270"><a href="#270">270</a></td></tr
><tr id="gr_svn197_271"

><td id="271"><a href="#271">271</a></td></tr
><tr id="gr_svn197_272"

><td id="272"><a href="#272">272</a></td></tr
><tr id="gr_svn197_273"

><td id="273"><a href="#273">273</a></td></tr
><tr id="gr_svn197_274"

><td id="274"><a href="#274">274</a></td></tr
><tr id="gr_svn197_275"

><td id="275"><a href="#275">275</a></td></tr
><tr id="gr_svn197_276"

><td id="276"><a href="#276">276</a></td></tr
><tr id="gr_svn197_277"

><td id="277"><a href="#277">277</a></td></tr
><tr id="gr_svn197_278"

><td id="278"><a href="#278">278</a></td></tr
><tr id="gr_svn197_279"

><td id="279"><a href="#279">279</a></td></tr
><tr id="gr_svn197_280"

><td id="280"><a href="#280">280</a></td></tr
><tr id="gr_svn197_281"

><td id="281"><a href="#281">281</a></td></tr
><tr id="gr_svn197_282"

><td id="282"><a href="#282">282</a></td></tr
><tr id="gr_svn197_283"

><td id="283"><a href="#283">283</a></td></tr
><tr id="gr_svn197_284"

><td id="284"><a href="#284">284</a></td></tr
><tr id="gr_svn197_285"

><td id="285"><a href="#285">285</a></td></tr
><tr id="gr_svn197_286"

><td id="286"><a href="#286">286</a></td></tr
><tr id="gr_svn197_287"

><td id="287"><a href="#287">287</a></td></tr
><tr id="gr_svn197_288"

><td id="288"><a href="#288">288</a></td></tr
><tr id="gr_svn197_289"

><td id="289"><a href="#289">289</a></td></tr
><tr id="gr_svn197_290"

><td id="290"><a href="#290">290</a></td></tr
><tr id="gr_svn197_291"

><td id="291"><a href="#291">291</a></td></tr
><tr id="gr_svn197_292"

><td id="292"><a href="#292">292</a></td></tr
><tr id="gr_svn197_293"

><td id="293"><a href="#293">293</a></td></tr
><tr id="gr_svn197_294"

><td id="294"><a href="#294">294</a></td></tr
><tr id="gr_svn197_295"

><td id="295"><a href="#295">295</a></td></tr
><tr id="gr_svn197_296"

><td id="296"><a href="#296">296</a></td></tr
><tr id="gr_svn197_297"

><td id="297"><a href="#297">297</a></td></tr
><tr id="gr_svn197_298"

><td id="298"><a href="#298">298</a></td></tr
><tr id="gr_svn197_299"

><td id="299"><a href="#299">299</a></td></tr
><tr id="gr_svn197_300"

><td id="300"><a href="#300">300</a></td></tr
><tr id="gr_svn197_301"

><td id="301"><a href="#301">301</a></td></tr
><tr id="gr_svn197_302"

><td id="302"><a href="#302">302</a></td></tr
><tr id="gr_svn197_303"

><td id="303"><a href="#303">303</a></td></tr
><tr id="gr_svn197_304"

><td id="304"><a href="#304">304</a></td></tr
><tr id="gr_svn197_305"

><td id="305"><a href="#305">305</a></td></tr
><tr id="gr_svn197_306"

><td id="306"><a href="#306">306</a></td></tr
><tr id="gr_svn197_307"

><td id="307"><a href="#307">307</a></td></tr
><tr id="gr_svn197_308"

><td id="308"><a href="#308">308</a></td></tr
><tr id="gr_svn197_309"

><td id="309"><a href="#309">309</a></td></tr
><tr id="gr_svn197_310"

><td id="310"><a href="#310">310</a></td></tr
><tr id="gr_svn197_311"

><td id="311"><a href="#311">311</a></td></tr
><tr id="gr_svn197_312"

><td id="312"><a href="#312">312</a></td></tr
><tr id="gr_svn197_313"

><td id="313"><a href="#313">313</a></td></tr
><tr id="gr_svn197_314"

><td id="314"><a href="#314">314</a></td></tr
><tr id="gr_svn197_315"

><td id="315"><a href="#315">315</a></td></tr
><tr id="gr_svn197_316"

><td id="316"><a href="#316">316</a></td></tr
><tr id="gr_svn197_317"

><td id="317"><a href="#317">317</a></td></tr
><tr id="gr_svn197_318"

><td id="318"><a href="#318">318</a></td></tr
><tr id="gr_svn197_319"

><td id="319"><a href="#319">319</a></td></tr
><tr id="gr_svn197_320"

><td id="320"><a href="#320">320</a></td></tr
><tr id="gr_svn197_321"

><td id="321"><a href="#321">321</a></td></tr
><tr id="gr_svn197_322"

><td id="322"><a href="#322">322</a></td></tr
><tr id="gr_svn197_323"

><td id="323"><a href="#323">323</a></td></tr
><tr id="gr_svn197_324"

><td id="324"><a href="#324">324</a></td></tr
><tr id="gr_svn197_325"

><td id="325"><a href="#325">325</a></td></tr
><tr id="gr_svn197_326"

><td id="326"><a href="#326">326</a></td></tr
><tr id="gr_svn197_327"

><td id="327"><a href="#327">327</a></td></tr
><tr id="gr_svn197_328"

><td id="328"><a href="#328">328</a></td></tr
><tr id="gr_svn197_329"

><td id="329"><a href="#329">329</a></td></tr
><tr id="gr_svn197_330"

><td id="330"><a href="#330">330</a></td></tr
><tr id="gr_svn197_331"

><td id="331"><a href="#331">331</a></td></tr
><tr id="gr_svn197_332"

><td id="332"><a href="#332">332</a></td></tr
></table></pre>
<pre><table width="100%"><tr class="nocursor"><td></td></tr></table></pre>
</td>
<td id="lines">
<pre><table width="100%"><tr class="cursor_stop cursor_hidden"><td></td></tr></table></pre>
<pre class="prettyprint lang-js"><table id="src_table_0"><tr
id=sl_svn197_1

><td class="source">/**<br></td></tr
><tr
id=sl_svn197_2

><td class="source"> * @version: 1.0 Alpha-1<br></td></tr
><tr
id=sl_svn197_3

><td class="source"> * @author: Coolite Inc. http://www.coolite.com/<br></td></tr
><tr
id=sl_svn197_4

><td class="source"> * @date: 2008-04-13<br></td></tr
><tr
id=sl_svn197_5

><td class="source"> * @copyright: Copyright (c) 2006-2008, Coolite Inc. (http://www.coolite.com/). All rights reserved.<br></td></tr
><tr
id=sl_svn197_6

><td class="source"> * @license: Licensed under The MIT License. See license.txt and http://www.datejs.com/license/. <br></td></tr
><tr
id=sl_svn197_7

><td class="source"> * @website: http://www.datejs.com/<br></td></tr
><tr
id=sl_svn197_8

><td class="source"> */<br></td></tr
><tr
id=sl_svn197_9

><td class="source"> <br></td></tr
><tr
id=sl_svn197_10

><td class="source">(function () {<br></td></tr
><tr
id=sl_svn197_11

><td class="source">    var $D = Date, <br></td></tr
><tr
id=sl_svn197_12

><td class="source">        $P = $D.prototype, <br></td></tr
><tr
id=sl_svn197_13

><td class="source">        $C = $D.CultureInfo,<br></td></tr
><tr
id=sl_svn197_14

><td class="source">        $f = [],<br></td></tr
><tr
id=sl_svn197_15

><td class="source">        p = function (s, l) {<br></td></tr
><tr
id=sl_svn197_16

><td class="source">            if (!l) {<br></td></tr
><tr
id=sl_svn197_17

><td class="source">                l = 2;<br></td></tr
><tr
id=sl_svn197_18

><td class="source">            }<br></td></tr
><tr
id=sl_svn197_19

><td class="source">            return (&quot;000&quot; + s).slice(l * -1);<br></td></tr
><tr
id=sl_svn197_20

><td class="source">        };<br></td></tr
><tr
id=sl_svn197_21

><td class="source"><br></td></tr
><tr
id=sl_svn197_22

><td class="source">    /**<br></td></tr
><tr
id=sl_svn197_23

><td class="source">     * Converts a PHP format string to Java/.NET format string. <br></td></tr
><tr
id=sl_svn197_24

><td class="source">     * A PHP format string can be used with .$format or .format.<br></td></tr
><tr
id=sl_svn197_25

><td class="source">     * A Java/.NET format string can be used with .toString().<br></td></tr
><tr
id=sl_svn197_26

><td class="source">     * The .parseExact function will only accept a Java/.NET format string<br></td></tr
><tr
id=sl_svn197_27

><td class="source">     *<br></td></tr
><tr
id=sl_svn197_28

><td class="source">     * Example<br></td></tr
><tr
id=sl_svn197_29

><td class="source">     &lt;pre&gt;<br></td></tr
><tr
id=sl_svn197_30

><td class="source">     var f1 = &quot;%m/%d/%y&quot;<br></td></tr
><tr
id=sl_svn197_31

><td class="source">     var f2 = Date.normalizeFormat(f1); // &quot;MM/dd/yy&quot;<br></td></tr
><tr
id=sl_svn197_32

><td class="source">     <br></td></tr
><tr
id=sl_svn197_33

><td class="source">     new Date().format(f1);    // &quot;04/13/08&quot;<br></td></tr
><tr
id=sl_svn197_34

><td class="source">     new Date().$format(f1);   // &quot;04/13/08&quot;<br></td></tr
><tr
id=sl_svn197_35

><td class="source">     new Date().toString(f2);  // &quot;04/13/08&quot;<br></td></tr
><tr
id=sl_svn197_36

><td class="source">     <br></td></tr
><tr
id=sl_svn197_37

><td class="source">     var date = Date.parseExact(&quot;04/13/08&quot;, f2); // Sun Apr 13 2008<br></td></tr
><tr
id=sl_svn197_38

><td class="source">     &lt;/pre&gt;<br></td></tr
><tr
id=sl_svn197_39

><td class="source">     * @param {String}   A PHP format string consisting of one or more format spcifiers.<br></td></tr
><tr
id=sl_svn197_40

><td class="source">     * @return {String}  The PHP format converted to a Java/.NET format string.<br></td></tr
><tr
id=sl_svn197_41

><td class="source">     */        <br></td></tr
><tr
id=sl_svn197_42

><td class="source">    $D.normalizeFormat = function (format) {<br></td></tr
><tr
id=sl_svn197_43

><td class="source">        $f = [];<br></td></tr
><tr
id=sl_svn197_44

><td class="source">        var t = new Date().$format(format);<br></td></tr
><tr
id=sl_svn197_45

><td class="source">        return $f.join(&quot;&quot;);<br></td></tr
><tr
id=sl_svn197_46

><td class="source">    };<br></td></tr
><tr
id=sl_svn197_47

><td class="source"><br></td></tr
><tr
id=sl_svn197_48

><td class="source">    /**<br></td></tr
><tr
id=sl_svn197_49

><td class="source">     * Format a local Unix timestamp according to locale settings<br></td></tr
><tr
id=sl_svn197_50

><td class="source">     * <br></td></tr
><tr
id=sl_svn197_51

><td class="source">     * Example<br></td></tr
><tr
id=sl_svn197_52

><td class="source">     &lt;pre&gt;<br></td></tr
><tr
id=sl_svn197_53

><td class="source">     Date.strftime(&quot;%m/%d/%y&quot;, new Date());       // &quot;04/13/08&quot;<br></td></tr
><tr
id=sl_svn197_54

><td class="source">     Date.strftime(&quot;c&quot;, &quot;2008-04-13T17:52:03Z&quot;);  // &quot;04/13/08&quot;<br></td></tr
><tr
id=sl_svn197_55

><td class="source">     &lt;/pre&gt;<br></td></tr
><tr
id=sl_svn197_56

><td class="source">     * @param {String}   A format string consisting of one or more format spcifiers [Optional].<br></td></tr
><tr
id=sl_svn197_57

><td class="source">     * @param {Number}   The number representing the number of seconds that have elapsed since January 1, 1970 (local time). <br></td></tr
><tr
id=sl_svn197_58

><td class="source">     * @return {String}  A string representation of the current Date object.<br></td></tr
><tr
id=sl_svn197_59

><td class="source">     */<br></td></tr
><tr
id=sl_svn197_60

><td class="source">    $D.strftime = function (format, time) {<br></td></tr
><tr
id=sl_svn197_61

><td class="source">        return new Date(time * 1000).$format(format);<br></td></tr
><tr
id=sl_svn197_62

><td class="source">    };<br></td></tr
><tr
id=sl_svn197_63

><td class="source"><br></td></tr
><tr
id=sl_svn197_64

><td class="source">    /**<br></td></tr
><tr
id=sl_svn197_65

><td class="source">     * Parse any textual datetime description into a Unix timestamp. <br></td></tr
><tr
id=sl_svn197_66

><td class="source">     * A Unix timestamp is the number of seconds that have elapsed since January 1, 1970 (midnight UTC/GMT).<br></td></tr
><tr
id=sl_svn197_67

><td class="source">     * <br></td></tr
><tr
id=sl_svn197_68

><td class="source">     * Example<br></td></tr
><tr
id=sl_svn197_69

><td class="source">     &lt;pre&gt;<br></td></tr
><tr
id=sl_svn197_70

><td class="source">     Date.strtotime(&quot;04/13/08&quot;);              // 1208044800<br></td></tr
><tr
id=sl_svn197_71

><td class="source">     Date.strtotime(&quot;1970-01-01T00:00:00Z&quot;);  // 0<br></td></tr
><tr
id=sl_svn197_72

><td class="source">     &lt;/pre&gt;<br></td></tr
><tr
id=sl_svn197_73

><td class="source">     * @param {String}   A format string consisting of one or more format spcifiers [Optional].<br></td></tr
><tr
id=sl_svn197_74

><td class="source">     * @param {Object}   A string or date object.<br></td></tr
><tr
id=sl_svn197_75

><td class="source">     * @return {String}  A string representation of the current Date object.<br></td></tr
><tr
id=sl_svn197_76

><td class="source">     */<br></td></tr
><tr
id=sl_svn197_77

><td class="source">    $D.strtotime = function (time) {<br></td></tr
><tr
id=sl_svn197_78

><td class="source">        var d = $D.parse(time);<br></td></tr
><tr
id=sl_svn197_79

><td class="source">        d.addMinutes(d.getTimezoneOffset() * -1);<br></td></tr
><tr
id=sl_svn197_80

><td class="source">        return Math.round($D.UTC(d.getUTCFullYear(), d.getUTCMonth(), d.getUTCDate(), d.getUTCHours(), d.getUTCMinutes(), d.getUTCSeconds(), d.getUTCMilliseconds()) / 1000);<br></td></tr
><tr
id=sl_svn197_81

><td class="source">    };<br></td></tr
><tr
id=sl_svn197_82

><td class="source"><br></td></tr
><tr
id=sl_svn197_83

><td class="source">    /**<br></td></tr
><tr
id=sl_svn197_84

><td class="source">     * Converts the value of the current Date object to its equivalent string representation using a PHP/Unix style of date format specifiers.<br></td></tr
><tr
id=sl_svn197_85

><td class="source">     *<br></td></tr
><tr
id=sl_svn197_86

><td class="source">     * The following descriptions are from http://www.php.net/strftime and http://www.php.net/manual/en/function.date.php. <br></td></tr
><tr
id=sl_svn197_87

><td class="source">     * Copyright © 2001-2008 The PHP Group<br></td></tr
><tr
id=sl_svn197_88

><td class="source">     * <br></td></tr
><tr
id=sl_svn197_89

><td class="source">     * Format Specifiers<br></td></tr
><tr
id=sl_svn197_90

><td class="source">     &lt;pre&gt;<br></td></tr
><tr
id=sl_svn197_91

><td class="source">    Format  Description                                                                  Example<br></td></tr
><tr
id=sl_svn197_92

><td class="source">    ------  ---------------------------------------------------------------------------  -----------------------<br></td></tr
><tr
id=sl_svn197_93

><td class="source">     %a     abbreviated weekday name according to the current localed                    &quot;Mon&quot; through &quot;Sun&quot;<br></td></tr
><tr
id=sl_svn197_94

><td class="source">     %A     full weekday name according to the current locale                            &quot;Sunday&quot; through &quot;Saturday&quot;<br></td></tr
><tr
id=sl_svn197_95

><td class="source">     %b     abbreviated month name according to the current locale                       &quot;Jan&quot; through &quot;Dec&quot;<br></td></tr
><tr
id=sl_svn197_96

><td class="source">     %B     full month name according to the current locale                              &quot;January&quot; through &quot;December&quot;<br></td></tr
><tr
id=sl_svn197_97

><td class="source">     %c     preferred date and time representation for the current locale                &quot;4/13/2008 12:33 PM&quot;<br></td></tr
><tr
id=sl_svn197_98

><td class="source">     %C     century number (the year divided by 100 and truncated to an integer)         &quot;00&quot; to &quot;99&quot;<br></td></tr
><tr
id=sl_svn197_99

><td class="source">     %d     day of the month as a decimal number                                         &quot;01&quot; to &quot;31&quot;<br></td></tr
><tr
id=sl_svn197_100

><td class="source">     %D     same as %m/%d/%y                                                             &quot;04/13/08&quot;<br></td></tr
><tr
id=sl_svn197_101

><td class="source">     %e     day of the month as a decimal number, a single digit is preceded by a space  &quot;1&quot; to &quot;31&quot;<br></td></tr
><tr
id=sl_svn197_102

><td class="source">     %g     like %G, but without the century                                             &quot;08&quot;<br></td></tr
><tr
id=sl_svn197_103

><td class="source">     %G     The 4-digit year corresponding to the ISO week number (see %V).              &quot;2008&quot;<br></td></tr
><tr
id=sl_svn197_104

><td class="source">            This has the same format and value as %Y, except that if the ISO week number <br></td></tr
><tr
id=sl_svn197_105

><td class="source">            belongs to the previous or next year, that year is used instead.<br></td></tr
><tr
id=sl_svn197_106

><td class="source">     %h     same as %b                                                                   &quot;Jan&quot; through &quot;Dec&quot;<br></td></tr
><tr
id=sl_svn197_107

><td class="source">     %H     hour as a decimal number using a 24-hour clock                               &quot;00&quot; to &quot;23&quot;<br></td></tr
><tr
id=sl_svn197_108

><td class="source">     %I     hour as a decimal number using a 12-hour clock                               &quot;01&quot; to &quot;12&quot;<br></td></tr
><tr
id=sl_svn197_109

><td class="source">     %j     day of the year as a decimal number                                          &quot;001&quot; to &quot;366&quot;<br></td></tr
><tr
id=sl_svn197_110

><td class="source">     %m     month as a decimal number                                                    &quot;01&quot; to &quot;12&quot;<br></td></tr
><tr
id=sl_svn197_111

><td class="source">     %M     minute as a decimal number                                                   &quot;00&quot; to &quot;59&quot;<br></td></tr
><tr
id=sl_svn197_112

><td class="source">     %n     newline character                                                            &quot;\n&quot;<br></td></tr
><tr
id=sl_svn197_113

><td class="source">     %p     either &quot;am&quot; or &quot;pm&quot; according to the given time value, or the                &quot;am&quot; or &quot;pm&quot;<br></td></tr
><tr
id=sl_svn197_114

><td class="source">            corresponding strings for the current locale<br></td></tr
><tr
id=sl_svn197_115

><td class="source">     %r     time in a.m. and p.m. notation                                               &quot;8:44 PM&quot;<br></td></tr
><tr
id=sl_svn197_116

><td class="source">     %R     time in 24 hour notation                                                     &quot;20:44&quot;<br></td></tr
><tr
id=sl_svn197_117

><td class="source">     %S     second as a decimal number                                                   &quot;00&quot; to &quot;59&quot;<br></td></tr
><tr
id=sl_svn197_118

><td class="source">     %t     tab character                                                                &quot;\t&quot;<br></td></tr
><tr
id=sl_svn197_119

><td class="source">     %T     current time, equal to %H:%M:%S                                              &quot;12:49:11&quot;<br></td></tr
><tr
id=sl_svn197_120

><td class="source">     %u     weekday as a decimal number [&quot;1&quot;, &quot;7&quot;], with &quot;1&quot; representing Monday         &quot;1&quot; to &quot;7&quot;<br></td></tr
><tr
id=sl_svn197_121

><td class="source">     %U     week number of the current year as a decimal number, starting with the       &quot;0&quot; to (&quot;52&quot; or &quot;53&quot;)<br></td></tr
><tr
id=sl_svn197_122

><td class="source">            first Sunday as the first day of the first week<br></td></tr
><tr
id=sl_svn197_123

><td class="source">     %V     The ISO 8601:1988 week number of the current year as a decimal number,       &quot;00&quot; to (&quot;52&quot; or &quot;53&quot;)<br></td></tr
><tr
id=sl_svn197_124

><td class="source">            range 01 to 53, where week 1 is the first week that has at least 4 days <br></td></tr
><tr
id=sl_svn197_125

><td class="source">            in the current year, and with Monday as the first day of the week. <br></td></tr
><tr
id=sl_svn197_126

><td class="source">            (Use %G or %g for the year component that corresponds to the week number <br></td></tr
><tr
id=sl_svn197_127

><td class="source">            for the specified timestamp.)<br></td></tr
><tr
id=sl_svn197_128

><td class="source">     %W     week number of the current year as a decimal number, starting with the       &quot;00&quot; to (&quot;52&quot; or &quot;53&quot;)<br></td></tr
><tr
id=sl_svn197_129

><td class="source">            first Monday as the first day of the first week<br></td></tr
><tr
id=sl_svn197_130

><td class="source">     %w     day of the week as a decimal, Sunday being &quot;0&quot;                               &quot;0&quot; to &quot;6&quot;<br></td></tr
><tr
id=sl_svn197_131

><td class="source">     %x     preferred date representation for the current locale without the time        &quot;4/13/2008&quot;<br></td></tr
><tr
id=sl_svn197_132

><td class="source">     %X     preferred time representation for the current locale without the date        &quot;12:53:05&quot;<br></td></tr
><tr
id=sl_svn197_133

><td class="source">     %y     year as a decimal number without a century                                   &quot;00&quot; &quot;99&quot;<br></td></tr
><tr
id=sl_svn197_134

><td class="source">     %Y     year as a decimal number including the century                               &quot;2008&quot;<br></td></tr
><tr
id=sl_svn197_135

><td class="source">     %Z     time zone or name or abbreviation                                            &quot;UTC&quot;, &quot;EST&quot;, &quot;PST&quot;<br></td></tr
><tr
id=sl_svn197_136

><td class="source">     %z     same as %Z <br></td></tr
><tr
id=sl_svn197_137

><td class="source">     %%     a literal &quot;%&quot; character                                                      &quot;%&quot;<br></td></tr
><tr
id=sl_svn197_138

><td class="source">      <br></td></tr
><tr
id=sl_svn197_139

><td class="source">     d      Day of the month, 2 digits with leading zeros                                &quot;01&quot; to &quot;31&quot;<br></td></tr
><tr
id=sl_svn197_140

><td class="source">     D      A textual representation of a day, three letters                             &quot;Mon&quot; through &quot;Sun&quot;<br></td></tr
><tr
id=sl_svn197_141

><td class="source">     j      Day of the month without leading zeros                                       &quot;1&quot; to &quot;31&quot;<br></td></tr
><tr
id=sl_svn197_142

><td class="source">     l      A full textual representation of the day of the week (lowercase &quot;L&quot;)         &quot;Sunday&quot; through &quot;Saturday&quot;<br></td></tr
><tr
id=sl_svn197_143

><td class="source">     N      ISO-8601 numeric representation of the day of the week (added in PHP 5.1.0)  &quot;1&quot; (for Monday) through &quot;7&quot; (for Sunday)<br></td></tr
><tr
id=sl_svn197_144

><td class="source">     S      English ordinal suffix for the day of the month, 2 characters                &quot;st&quot;, &quot;nd&quot;, &quot;rd&quot; or &quot;th&quot;. Works well with j<br></td></tr
><tr
id=sl_svn197_145

><td class="source">     w      Numeric representation of the day of the week                                &quot;0&quot; (for Sunday) through &quot;6&quot; (for Saturday)<br></td></tr
><tr
id=sl_svn197_146

><td class="source">     z      The day of the year (starting from &quot;0&quot;)                                      &quot;0&quot; through &quot;365&quot;      <br></td></tr
><tr
id=sl_svn197_147

><td class="source">     W      ISO-8601 week number of year, weeks starting on Monday                       &quot;00&quot; to (&quot;52&quot; or &quot;53&quot;)<br></td></tr
><tr
id=sl_svn197_148

><td class="source">     F      A full textual representation of a month, such as January or March           &quot;January&quot; through &quot;December&quot;<br></td></tr
><tr
id=sl_svn197_149

><td class="source">     m      Numeric representation of a month, with leading zeros                        &quot;01&quot; through &quot;12&quot;<br></td></tr
><tr
id=sl_svn197_150

><td class="source">     M      A short textual representation of a month, three letters                     &quot;Jan&quot; through &quot;Dec&quot;<br></td></tr
><tr
id=sl_svn197_151

><td class="source">     n      Numeric representation of a month, without leading zeros                     &quot;1&quot; through &quot;12&quot;<br></td></tr
><tr
id=sl_svn197_152

><td class="source">     t      Number of days in the given month                                            &quot;28&quot; through &quot;31&quot;<br></td></tr
><tr
id=sl_svn197_153

><td class="source">     L      Whether it&#39;s a leap year                                                     &quot;1&quot; if it is a leap year, &quot;0&quot; otherwise<br></td></tr
><tr
id=sl_svn197_154

><td class="source">     o      ISO-8601 year number. This has the same value as Y, except that if the       &quot;2008&quot;<br></td></tr
><tr
id=sl_svn197_155

><td class="source">            ISO week number (W) belongs to the previous or next year, that year <br></td></tr
><tr
id=sl_svn197_156

><td class="source">            is used instead.<br></td></tr
><tr
id=sl_svn197_157

><td class="source">     Y      A full numeric representation of a year, 4 digits                            &quot;2008&quot;<br></td></tr
><tr
id=sl_svn197_158

><td class="source">     y      A two digit representation of a year                                         &quot;08&quot;<br></td></tr
><tr
id=sl_svn197_159

><td class="source">     a      Lowercase Ante meridiem and Post meridiem                                    &quot;am&quot; or &quot;pm&quot;<br></td></tr
><tr
id=sl_svn197_160

><td class="source">     A      Uppercase Ante meridiem and Post meridiem                                    &quot;AM&quot; or &quot;PM&quot;<br></td></tr
><tr
id=sl_svn197_161

><td class="source">     B      Swatch Internet time                                                         &quot;000&quot; through &quot;999&quot;<br></td></tr
><tr
id=sl_svn197_162

><td class="source">     g      12-hour format of an hour without leading zeros                              &quot;1&quot; through &quot;12&quot;<br></td></tr
><tr
id=sl_svn197_163

><td class="source">     G      24-hour format of an hour without leading zeros                              &quot;0&quot; through &quot;23&quot;<br></td></tr
><tr
id=sl_svn197_164

><td class="source">     h      12-hour format of an hour with leading zeros                                 &quot;01&quot; through &quot;12&quot;<br></td></tr
><tr
id=sl_svn197_165

><td class="source">     H      24-hour format of an hour with leading zeros                                 &quot;00&quot; through &quot;23&quot;<br></td></tr
><tr
id=sl_svn197_166

><td class="source">     i      Minutes with leading zeros                                                   &quot;00&quot; to &quot;59&quot;<br></td></tr
><tr
id=sl_svn197_167

><td class="source">     s      Seconds, with leading zeros                                                  &quot;00&quot; through &quot;59&quot;<br></td></tr
><tr
id=sl_svn197_168

><td class="source">     u      Milliseconds                                                                 &quot;54321&quot;<br></td></tr
><tr
id=sl_svn197_169

><td class="source">     e      Timezone identifier                                                          &quot;UTC&quot;, &quot;EST&quot;, &quot;PST&quot;<br></td></tr
><tr
id=sl_svn197_170

><td class="source">     I      Whether or not the date is in daylight saving time (uppercase i)             &quot;1&quot; if Daylight Saving Time, &quot;0&quot; otherwise<br></td></tr
><tr
id=sl_svn197_171

><td class="source">     O      Difference to Greenwich time (GMT) in hours                                  &quot;+0200&quot;, &quot;-0600&quot;<br></td></tr
><tr
id=sl_svn197_172

><td class="source">     P      Difference to Greenwich time (GMT) with colon between hours and minutes      &quot;+02:00&quot;, &quot;-06:00&quot;<br></td></tr
><tr
id=sl_svn197_173

><td class="source">     T      Timezone abbreviation                                                        &quot;UTC&quot;, &quot;EST&quot;, &quot;PST&quot;<br></td></tr
><tr
id=sl_svn197_174

><td class="source">     Z      Timezone offset in seconds. The offset for timezones west of UTC is          &quot;-43200&quot; through &quot;50400&quot;<br></td></tr
><tr
id=sl_svn197_175

><td class="source">            always negative, and for those east of UTC is always positive.<br></td></tr
><tr
id=sl_svn197_176

><td class="source">     c      ISO 8601 date                                                                &quot;2004-02-12T15:19:21+00:00&quot;<br></td></tr
><tr
id=sl_svn197_177

><td class="source">     r      RFC 2822 formatted date                                                      &quot;Thu, 21 Dec 2000 16:01:07 +0200&quot;<br></td></tr
><tr
id=sl_svn197_178

><td class="source">     U      Seconds since the Unix Epoch (January 1 1970 00:00:00 GMT)                   &quot;0&quot;     <br></td></tr
><tr
id=sl_svn197_179

><td class="source">     &lt;/pre&gt;<br></td></tr
><tr
id=sl_svn197_180

><td class="source">     * @param {String}   A format string consisting of one or more format spcifiers [Optional].<br></td></tr
><tr
id=sl_svn197_181

><td class="source">     * @return {String}  A string representation of the current Date object.<br></td></tr
><tr
id=sl_svn197_182

><td class="source">     */<br></td></tr
><tr
id=sl_svn197_183

><td class="source">    $P.$format = function (format) { <br></td></tr
><tr
id=sl_svn197_184

><td class="source">        var x = this, <br></td></tr
><tr
id=sl_svn197_185

><td class="source">            y,<br></td></tr
><tr
id=sl_svn197_186

><td class="source">            t = function (v) {<br></td></tr
><tr
id=sl_svn197_187

><td class="source">                $f.push(v);<br></td></tr
><tr
id=sl_svn197_188

><td class="source">                return x.toString(v);<br></td></tr
><tr
id=sl_svn197_189

><td class="source">            };<br></td></tr
><tr
id=sl_svn197_190

><td class="source"><br></td></tr
><tr
id=sl_svn197_191

><td class="source">        return format ? format.replace(/(%|\\)?.|%%/g, <br></td></tr
><tr
id=sl_svn197_192

><td class="source">        function (m) {<br></td></tr
><tr
id=sl_svn197_193

><td class="source">            if (m.charAt(0) === &quot;\\&quot; || m.substring(0, 2) === &quot;%%&quot;) {<br></td></tr
><tr
id=sl_svn197_194

><td class="source">                return m.replace(&quot;\\&quot;, &quot;&quot;).replace(&quot;%%&quot;, &quot;%&quot;);<br></td></tr
><tr
id=sl_svn197_195

><td class="source">            }<br></td></tr
><tr
id=sl_svn197_196

><td class="source">            switch (m) {<br></td></tr
><tr
id=sl_svn197_197

><td class="source">            case &quot;d&quot;:<br></td></tr
><tr
id=sl_svn197_198

><td class="source">            case &quot;%d&quot;:<br></td></tr
><tr
id=sl_svn197_199

><td class="source">                return t(&quot;dd&quot;);<br></td></tr
><tr
id=sl_svn197_200

><td class="source">            case &quot;D&quot;:<br></td></tr
><tr
id=sl_svn197_201

><td class="source">            case &quot;%a&quot;:<br></td></tr
><tr
id=sl_svn197_202

><td class="source">                return t(&quot;ddd&quot;);<br></td></tr
><tr
id=sl_svn197_203

><td class="source">            case &quot;j&quot;:<br></td></tr
><tr
id=sl_svn197_204

><td class="source">            case &quot;%e&quot;:<br></td></tr
><tr
id=sl_svn197_205

><td class="source">                return t(&quot;d&quot;);<br></td></tr
><tr
id=sl_svn197_206

><td class="source">            case &quot;l&quot;:<br></td></tr
><tr
id=sl_svn197_207

><td class="source">            case &quot;%A&quot;:<br></td></tr
><tr
id=sl_svn197_208

><td class="source">                return t(&quot;dddd&quot;);<br></td></tr
><tr
id=sl_svn197_209

><td class="source">            case &quot;N&quot;:<br></td></tr
><tr
id=sl_svn197_210

><td class="source">            case &quot;%u&quot;:<br></td></tr
><tr
id=sl_svn197_211

><td class="source">                return x.getDay() + 1;<br></td></tr
><tr
id=sl_svn197_212

><td class="source">            case &quot;S&quot;:<br></td></tr
><tr
id=sl_svn197_213

><td class="source">                return t(&quot;S&quot;);<br></td></tr
><tr
id=sl_svn197_214

><td class="source">            case &quot;w&quot;:<br></td></tr
><tr
id=sl_svn197_215

><td class="source">            case &quot;%w&quot;:<br></td></tr
><tr
id=sl_svn197_216

><td class="source">                return x.getDay();<br></td></tr
><tr
id=sl_svn197_217

><td class="source">            case &quot;z&quot;:<br></td></tr
><tr
id=sl_svn197_218

><td class="source">                return x.getOrdinalNumber();<br></td></tr
><tr
id=sl_svn197_219

><td class="source">            case &quot;%j&quot;:<br></td></tr
><tr
id=sl_svn197_220

><td class="source">                return p(x.getOrdinalNumber(), 3);<br></td></tr
><tr
id=sl_svn197_221

><td class="source">            case &quot;%U&quot;:<br></td></tr
><tr
id=sl_svn197_222

><td class="source">                var d1 = x.clone().set({month: 0, day: 1}).addDays(-1).moveToDayOfWeek(0),<br></td></tr
><tr
id=sl_svn197_223

><td class="source">                    d2 = x.clone().addDays(1).moveToDayOfWeek(0, -1);<br></td></tr
><tr
id=sl_svn197_224

><td class="source">                return (d2 &lt; d1) ? &quot;00&quot; : p((d2.getOrdinalNumber() - d1.getOrdinalNumber()) / 7 + 1);                <br></td></tr
><tr
id=sl_svn197_225

><td class="source">            case &quot;W&quot;:<br></td></tr
><tr
id=sl_svn197_226

><td class="source">            case &quot;%V&quot;:<br></td></tr
><tr
id=sl_svn197_227

><td class="source">                return x.getISOWeek();<br></td></tr
><tr
id=sl_svn197_228

><td class="source">            case &quot;%W&quot;:<br></td></tr
><tr
id=sl_svn197_229

><td class="source">                return p(x.getWeek());<br></td></tr
><tr
id=sl_svn197_230

><td class="source">            case &quot;F&quot;:<br></td></tr
><tr
id=sl_svn197_231

><td class="source">            case &quot;%B&quot;:<br></td></tr
><tr
id=sl_svn197_232

><td class="source">                return t(&quot;MMMM&quot;);<br></td></tr
><tr
id=sl_svn197_233

><td class="source">            case &quot;m&quot;:<br></td></tr
><tr
id=sl_svn197_234

><td class="source">            case &quot;%m&quot;:<br></td></tr
><tr
id=sl_svn197_235

><td class="source">                return t(&quot;MM&quot;);<br></td></tr
><tr
id=sl_svn197_236

><td class="source">            case &quot;M&quot;:<br></td></tr
><tr
id=sl_svn197_237

><td class="source">            case &quot;%b&quot;:<br></td></tr
><tr
id=sl_svn197_238

><td class="source">            case &quot;%h&quot;:<br></td></tr
><tr
id=sl_svn197_239

><td class="source">                return t(&quot;MMM&quot;);<br></td></tr
><tr
id=sl_svn197_240

><td class="source">            case &quot;n&quot;:<br></td></tr
><tr
id=sl_svn197_241

><td class="source">                return t(&quot;M&quot;);<br></td></tr
><tr
id=sl_svn197_242

><td class="source">            case &quot;t&quot;:<br></td></tr
><tr
id=sl_svn197_243

><td class="source">                return $D.getDaysInMonth(x.getFullYear(), x.getMonth());<br></td></tr
><tr
id=sl_svn197_244

><td class="source">            case &quot;L&quot;:<br></td></tr
><tr
id=sl_svn197_245

><td class="source">                return ($D.isLeapYear(x.getFullYear())) ? 1 : 0;<br></td></tr
><tr
id=sl_svn197_246

><td class="source">            case &quot;o&quot;:<br></td></tr
><tr
id=sl_svn197_247

><td class="source">            case &quot;%G&quot;:<br></td></tr
><tr
id=sl_svn197_248

><td class="source">                return x.setWeek(x.getISOWeek()).toString(&quot;yyyy&quot;);<br></td></tr
><tr
id=sl_svn197_249

><td class="source">            case &quot;%g&quot;:<br></td></tr
><tr
id=sl_svn197_250

><td class="source">                return x.$format(&quot;%G&quot;).slice(-2);<br></td></tr
><tr
id=sl_svn197_251

><td class="source">            case &quot;Y&quot;:<br></td></tr
><tr
id=sl_svn197_252

><td class="source">            case &quot;%Y&quot;:<br></td></tr
><tr
id=sl_svn197_253

><td class="source">                return t(&quot;yyyy&quot;);<br></td></tr
><tr
id=sl_svn197_254

><td class="source">            case &quot;y&quot;:<br></td></tr
><tr
id=sl_svn197_255

><td class="source">            case &quot;%y&quot;:<br></td></tr
><tr
id=sl_svn197_256

><td class="source">                return t(&quot;yy&quot;);<br></td></tr
><tr
id=sl_svn197_257

><td class="source">            case &quot;a&quot;:<br></td></tr
><tr
id=sl_svn197_258

><td class="source">            case &quot;%p&quot;:<br></td></tr
><tr
id=sl_svn197_259

><td class="source">                return t(&quot;tt&quot;).toLowerCase();<br></td></tr
><tr
id=sl_svn197_260

><td class="source">            case &quot;A&quot;:<br></td></tr
><tr
id=sl_svn197_261

><td class="source">                return t(&quot;tt&quot;).toUpperCase();<br></td></tr
><tr
id=sl_svn197_262

><td class="source">            case &quot;g&quot;:<br></td></tr
><tr
id=sl_svn197_263

><td class="source">            case &quot;%I&quot;:<br></td></tr
><tr
id=sl_svn197_264

><td class="source">                return t(&quot;h&quot;);<br></td></tr
><tr
id=sl_svn197_265

><td class="source">            case &quot;G&quot;:<br></td></tr
><tr
id=sl_svn197_266

><td class="source">                return t(&quot;H&quot;);<br></td></tr
><tr
id=sl_svn197_267

><td class="source">            case &quot;h&quot;:<br></td></tr
><tr
id=sl_svn197_268

><td class="source">                return t(&quot;hh&quot;);<br></td></tr
><tr
id=sl_svn197_269

><td class="source">            case &quot;H&quot;:<br></td></tr
><tr
id=sl_svn197_270

><td class="source">            case &quot;%H&quot;:<br></td></tr
><tr
id=sl_svn197_271

><td class="source">                return t(&quot;HH&quot;);<br></td></tr
><tr
id=sl_svn197_272

><td class="source">            case &quot;i&quot;:<br></td></tr
><tr
id=sl_svn197_273

><td class="source">            case &quot;%M&quot;:<br></td></tr
><tr
id=sl_svn197_274

><td class="source">                return t(&quot;mm&quot;);<br></td></tr
><tr
id=sl_svn197_275

><td class="source">            case &quot;s&quot;:<br></td></tr
><tr
id=sl_svn197_276

><td class="source">            case &quot;%S&quot;:<br></td></tr
><tr
id=sl_svn197_277

><td class="source">                return t(&quot;ss&quot;);<br></td></tr
><tr
id=sl_svn197_278

><td class="source">            case &quot;u&quot;:<br></td></tr
><tr
id=sl_svn197_279

><td class="source">                return p(x.getMilliseconds(), 3);<br></td></tr
><tr
id=sl_svn197_280

><td class="source">            case &quot;I&quot;:<br></td></tr
><tr
id=sl_svn197_281

><td class="source">                return (x.isDaylightSavingTime()) ? 1 : 0;<br></td></tr
><tr
id=sl_svn197_282

><td class="source">            case &quot;O&quot;:<br></td></tr
><tr
id=sl_svn197_283

><td class="source">                return x.getUTCOffset();<br></td></tr
><tr
id=sl_svn197_284

><td class="source">            case &quot;P&quot;:<br></td></tr
><tr
id=sl_svn197_285

><td class="source">                y = x.getUTCOffset();<br></td></tr
><tr
id=sl_svn197_286

><td class="source">                return y.substring(0, y.length - 2) + &quot;:&quot; + y.substring(y.length - 2);<br></td></tr
><tr
id=sl_svn197_287

><td class="source">            case &quot;e&quot;:<br></td></tr
><tr
id=sl_svn197_288

><td class="source">            case &quot;T&quot;:<br></td></tr
><tr
id=sl_svn197_289

><td class="source">            case &quot;%z&quot;:<br></td></tr
><tr
id=sl_svn197_290

><td class="source">            case &quot;%Z&quot;:            <br></td></tr
><tr
id=sl_svn197_291

><td class="source">                return x.getTimezone();<br></td></tr
><tr
id=sl_svn197_292

><td class="source">            case &quot;Z&quot;:<br></td></tr
><tr
id=sl_svn197_293

><td class="source">                return x.getTimezoneOffset() * -60;<br></td></tr
><tr
id=sl_svn197_294

><td class="source">            case &quot;B&quot;:<br></td></tr
><tr
id=sl_svn197_295

><td class="source">                var now = new Date();<br></td></tr
><tr
id=sl_svn197_296

><td class="source">                return Math.floor(((now.getHours() * 3600) + (now.getMinutes() * 60) + now.getSeconds() + (now.getTimezoneOffset() + 60) * 60) / 86.4);<br></td></tr
><tr
id=sl_svn197_297

><td class="source">            case &quot;c&quot;:<br></td></tr
><tr
id=sl_svn197_298

><td class="source">                return x.toISOString().replace(/\&quot;/g, &quot;&quot;);<br></td></tr
><tr
id=sl_svn197_299

><td class="source">            case &quot;U&quot;:<br></td></tr
><tr
id=sl_svn197_300

><td class="source">                return $D.strtotime(&quot;now&quot;);<br></td></tr
><tr
id=sl_svn197_301

><td class="source">            case &quot;%c&quot;:<br></td></tr
><tr
id=sl_svn197_302

><td class="source">                return t(&quot;d&quot;) + &quot; &quot; + t(&quot;t&quot;);<br></td></tr
><tr
id=sl_svn197_303

><td class="source">            case &quot;%C&quot;:<br></td></tr
><tr
id=sl_svn197_304

><td class="source">                return Math.floor(x.getFullYear() / 100 + 1);<br></td></tr
><tr
id=sl_svn197_305

><td class="source">            case &quot;%D&quot;:<br></td></tr
><tr
id=sl_svn197_306

><td class="source">                return t(&quot;MM/dd/yy&quot;);<br></td></tr
><tr
id=sl_svn197_307

><td class="source">            case &quot;%n&quot;:<br></td></tr
><tr
id=sl_svn197_308

><td class="source">                return &quot;\\n&quot;;<br></td></tr
><tr
id=sl_svn197_309

><td class="source">            case &quot;%t&quot;:<br></td></tr
><tr
id=sl_svn197_310

><td class="source">                return &quot;\\t&quot;;<br></td></tr
><tr
id=sl_svn197_311

><td class="source">            case &quot;%r&quot;:<br></td></tr
><tr
id=sl_svn197_312

><td class="source">                return t(&quot;hh:mm tt&quot;);                <br></td></tr
><tr
id=sl_svn197_313

><td class="source">            case &quot;%R&quot;:<br></td></tr
><tr
id=sl_svn197_314

><td class="source">                return t(&quot;H:mm&quot;);<br></td></tr
><tr
id=sl_svn197_315

><td class="source">            case &quot;%T&quot;:<br></td></tr
><tr
id=sl_svn197_316

><td class="source">                return t(&quot;H:mm:ss&quot;);<br></td></tr
><tr
id=sl_svn197_317

><td class="source">            case &quot;%x&quot;:<br></td></tr
><tr
id=sl_svn197_318

><td class="source">                return t(&quot;d&quot;);<br></td></tr
><tr
id=sl_svn197_319

><td class="source">            case &quot;%X&quot;:<br></td></tr
><tr
id=sl_svn197_320

><td class="source">                return t(&quot;t&quot;);<br></td></tr
><tr
id=sl_svn197_321

><td class="source">            default:<br></td></tr
><tr
id=sl_svn197_322

><td class="source">                $f.push(m);<br></td></tr
><tr
id=sl_svn197_323

><td class="source">			    return m;<br></td></tr
><tr
id=sl_svn197_324

><td class="source">            }<br></td></tr
><tr
id=sl_svn197_325

><td class="source">        }<br></td></tr
><tr
id=sl_svn197_326

><td class="source">        ) : this._toString();<br></td></tr
><tr
id=sl_svn197_327

><td class="source">    };<br></td></tr
><tr
id=sl_svn197_328

><td class="source">    <br></td></tr
><tr
id=sl_svn197_329

><td class="source">    if (!$P.format) {<br></td></tr
><tr
id=sl_svn197_330

><td class="source">        $P.format = $P.$format;<br></td></tr
><tr
id=sl_svn197_331

><td class="source">    }<br></td></tr
><tr
id=sl_svn197_332

><td class="source">}());    <br></td></tr
></table></pre>
<pre><table width="100%"><tr class="cursor_stop cursor_hidden"><td></td></tr></table></pre>
</td>
</tr></table>

 
<script type="text/javascript">
 var lineNumUnderMouse = -1;
 
 function gutterOver(num) {
 gutterOut();
 var newTR = document.getElementById('gr_svn197_' + num);
 if (newTR) {
 newTR.className = 'undermouse';
 }
 lineNumUnderMouse = num;
 }
 function gutterOut() {
 if (lineNumUnderMouse != -1) {
 var oldTR = document.getElementById(
 'gr_svn197_' + lineNumUnderMouse);
 if (oldTR) {
 oldTR.className = '';
 }
 lineNumUnderMouse = -1;
 }
 }
 var numsGenState = {table_base_id: 'nums_table_'};
 var srcGenState = {table_base_id: 'src_table_'};
 var alignerRunning = false;
 var startOver = false;
 function setLineNumberHeights() {
 if (alignerRunning) {
 startOver = true;
 return;
 }
 numsGenState.chunk_id = 0;
 numsGenState.table = document.getElementById('nums_table_0');
 numsGenState.row_num = 0;
 if (!numsGenState.table) {
 return; // Silently exit if no file is present.
 }
 srcGenState.chunk_id = 0;
 srcGenState.table = document.getElementById('src_table_0');
 srcGenState.row_num = 0;
 alignerRunning = true;
 continueToSetLineNumberHeights();
 }
 function rowGenerator(genState) {
 if (genState.row_num < genState.table.rows.length) {
 var currentRow = genState.table.rows[genState.row_num];
 genState.row_num++;
 return currentRow;
 }
 var newTable = document.getElementById(
 genState.table_base_id + (genState.chunk_id + 1));
 if (newTable) {
 genState.chunk_id++;
 genState.row_num = 0;
 genState.table = newTable;
 return genState.table.rows[0];
 }
 return null;
 }
 var MAX_ROWS_PER_PASS = 1000;
 function continueToSetLineNumberHeights() {
 var rowsInThisPass = 0;
 var numRow = 1;
 var srcRow = 1;
 while (numRow && srcRow && rowsInThisPass < MAX_ROWS_PER_PASS) {
 numRow = rowGenerator(numsGenState);
 srcRow = rowGenerator(srcGenState);
 rowsInThisPass++;
 if (numRow && srcRow) {
 if (numRow.offsetHeight != srcRow.offsetHeight) {
 numRow.firstChild.style.height = srcRow.offsetHeight + 'px';
 }
 }
 }
 if (rowsInThisPass >= MAX_ROWS_PER_PASS) {
 setTimeout(continueToSetLineNumberHeights, 10);
 } else {
 alignerRunning = false;
 if (startOver) {
 startOver = false;
 setTimeout(setLineNumberHeights, 500);
 }
 }
 }
 function initLineNumberHeights() {
 // Do 2 complete passes, because there can be races
 // between this code and prettify.
 startOver = true;
 setTimeout(setLineNumberHeights, 250);
 window.onresize = setLineNumberHeights;
 }
 initLineNumberHeights();
</script>

 
 
 <div id="log">
 <div style="text-align:right">
 <a class="ifCollapse" href="#" onclick="_toggleMeta(this); return false">Show details</a>
 <a class="ifExpand" href="#" onclick="_toggleMeta(this); return false">Hide details</a>
 </div>
 <div class="ifExpand">
 
 
 <div class="pmeta_bubble_bg" style="border:1px solid white">
 <div class="round4"></div>
 <div class="round2"></div>
 <div class="round1"></div>
 <div class="box-inner">
 <div id="changelog">
 <p>Change log</p>
 <div>
 <a href="/p/datejs/source/detail?spec=svn197&amp;r=182">r182</a>
 by ge...@coolite.com
 on Apr 25, 2008
 &nbsp; <a href="/p/datejs/source/diff?spec=svn197&r=182&amp;format=side&amp;path=/trunk/src/extras.js&amp;old_path=/trunk/src/extras.js&amp;old=162">Diff</a>
 </div>
 <pre>--------------------
2008-04-25 [geoffrey.mcgill]
<a href="/p/datejs/source/detail?r=182">Revision #182</a>

1.  Small correction in core.js and
extras.js to add an extra space in a
couple functions so they would
        pass JSLint
(<a href="http://www.jslint.com" rel="nofollow">http://www.jslint.com</a>) in white-space
strict mode.

2.  Revised online wiki documentation
...</pre>
 </div>
 
 
 
 
 
 
 <script type="text/javascript">
 var detail_url = '/p/datejs/source/detail?r=182&spec=svn197';
 var publish_url = '/p/datejs/source/detail?r=182&spec=svn197#publish';
 // describe the paths of this revision in javascript.
 var changed_paths = [];
 var changed_urls = [];
 
 changed_paths.push('/trunk/CHANGELOG.txt');
 changed_urls.push('/p/datejs/source/browse/trunk/CHANGELOG.txt?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/core.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/core.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-af-ZA.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-af-ZA.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-ar-AE.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-ar-AE.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-ar-BH.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-ar-BH.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-ar-DZ.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-ar-DZ.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-ar-EG.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-ar-EG.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-ar-IQ.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-ar-IQ.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-ar-JO.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-ar-JO.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-ar-KW.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-ar-KW.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-ar-LB.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-ar-LB.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-ar-LY.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-ar-LY.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-ar-MA.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-ar-MA.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-ar-OM.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-ar-OM.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-ar-QA.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-ar-QA.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-ar-SA.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-ar-SA.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-ar-SY.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-ar-SY.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-ar-TN.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-ar-TN.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-ar-YE.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-ar-YE.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-az-Cyrl-AZ.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-az-Cyrl-AZ.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-az-Latn-AZ.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-az-Latn-AZ.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-be-BY.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-be-BY.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-bg-BG.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-bg-BG.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-bs-Latn-BA.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-bs-Latn-BA.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-ca-ES.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-ca-ES.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-cs-CZ.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-cs-CZ.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-cy-GB.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-cy-GB.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-da-DK.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-da-DK.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-de-AT.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-de-AT.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-de-CH.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-de-CH.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-de-DE.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-de-DE.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-de-LI.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-de-LI.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-de-LU.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-de-LU.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-dv-MV.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-dv-MV.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-el-GR.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-el-GR.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-en-029.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-en-029.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-en-AU.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-en-AU.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-en-BZ.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-en-BZ.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-en-CA.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-en-CA.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-en-GB.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-en-GB.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-en-IE.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-en-IE.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-en-JM.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-en-JM.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-en-NZ.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-en-NZ.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-en-PH.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-en-PH.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-en-TT.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-en-TT.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-en-US.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-en-US.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-en-ZA.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-en-ZA.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-en-ZW.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-en-ZW.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-es-AR.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-es-AR.js?r\x3d182\x26spec\x3dsvn197');
 
 
 changed_paths.push('/trunk/build/date-es-BO.js');
 changed_urls.push('/p/datejs/source/browse/trunk/build/date-es-BO.js?r\x3d182\x26spec\x3dsvn197');
 
 
 function getCurrentPageIndex() {
 for (var i = 0; i < changed_paths.length; i++) {
 if (selected_path == changed_paths[i]) {
 return i;
 }
 }
 }
 function getNextPage() {
 var i = getCurrentPageIndex();
 if (i < changed_paths.length - 1) {
 return changed_urls[i + 1];
 }
 return null;
 }
 function getPreviousPage() {
 var i = getCurrentPageIndex();
 if (i > 0) {
 return changed_urls[i - 1];
 }
 return null;
 }
 function gotoNextPage() {
 var page = getNextPage();
 if (!page) {
 page = detail_url;
 }
 window.location = page;
 }
 function gotoPreviousPage() {
 var page = getPreviousPage();
 if (!page) {
 page = detail_url;
 }
 window.location = page;
 }
 function gotoDetailPage() {
 window.location = detail_url;
 }
 function gotoPublishPage() {
 window.location = publish_url;
 }
</script>

 
 <style type="text/css">
 #review_nav {
 border-top: 3px solid white;
 padding-top: 6px;
 margin-top: 1em;
 }
 #review_nav td {
 vertical-align: middle;
 }
 #review_nav select {
 margin: .5em 0;
 }
 </style>
 <div id="review_nav">
 <table><tr><td>Go to:&nbsp;</td><td>
 <select name="files_in_rev" onchange="window.location=this.value">
 
 <option value="/p/datejs/source/browse/trunk/CHANGELOG.txt?r=182&amp;spec=svn197"
 
 >/trunk/CHANGELOG.txt</option>
 
 <option value="/p/datejs/source/browse/trunk/build/core.js?r=182&amp;spec=svn197"
 
 >/trunk/build/core.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-af-ZA.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-af-ZA.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-ar-AE.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-ar-AE.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-ar-BH.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-ar-BH.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-ar-DZ.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-ar-DZ.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-ar-EG.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-ar-EG.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-ar-IQ.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-ar-IQ.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-ar-JO.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-ar-JO.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-ar-KW.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-ar-KW.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-ar-LB.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-ar-LB.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-ar-LY.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-ar-LY.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-ar-MA.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-ar-MA.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-ar-OM.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-ar-OM.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-ar-QA.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-ar-QA.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-ar-SA.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-ar-SA.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-ar-SY.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-ar-SY.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-ar-TN.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-ar-TN.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-ar-YE.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-ar-YE.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-az-Cyrl-AZ.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-az-Cyrl-AZ.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-az-Latn-AZ.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-az-Latn-AZ.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-be-BY.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-be-BY.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-bg-BG.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-bg-BG.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-bs-Latn-BA.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-bs-Latn-BA.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-ca-ES.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-ca-ES.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-cs-CZ.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-cs-CZ.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-cy-GB.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-cy-GB.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-da-DK.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-da-DK.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-de-AT.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-de-AT.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-de-CH.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-de-CH.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-de-DE.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-de-DE.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-de-LI.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-de-LI.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-de-LU.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-de-LU.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-dv-MV.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-dv-MV.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-el-GR.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-el-GR.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-en-029.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-en-029.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-en-AU.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-en-AU.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-en-BZ.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-en-BZ.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-en-CA.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-en-CA.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-en-GB.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-en-GB.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-en-IE.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-en-IE.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-en-JM.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-en-JM.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-en-NZ.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-en-NZ.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-en-PH.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-en-PH.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-en-TT.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-en-TT.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-en-US.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-en-US.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-en-ZA.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-en-ZA.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-en-ZW.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-en-ZW.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-es-AR.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-es-AR.js</option>
 
 <option value="/p/datejs/source/browse/trunk/build/date-es-BO.js?r=182&amp;spec=svn197"
 
 >/trunk/build/date-es-BO.js</option>
 
 </select>
 </td></tr></table>
 
 
 



 
 </div>
 
 
 </div>
 <div class="round1"></div>
 <div class="round2"></div>
 <div class="round4"></div>
 </div>
 <div class="pmeta_bubble_bg" style="border:1px solid white">
 <div class="round4"></div>
 <div class="round2"></div>
 <div class="round1"></div>
 <div class="box-inner">
 <div id="older_bubble">
 <p>Older revisions</p>
 
 
 <div class="closed" style="margin-bottom:3px;" >
 <img class="ifClosed" onclick="_toggleHidden(this)" src="http://www.gstatic.com/codesite/ph/images/plus.gif" >
 <img class="ifOpened" onclick="_toggleHidden(this)" src="http://www.gstatic.com/codesite/ph/images/minus.gif" >
 <a href="/p/datejs/source/detail?spec=svn197&r=162">r162</a>
 by ge...@coolite.com
 on Apr 13, 2008
 &nbsp; <a href="/p/datejs/source/diff?spec=svn197&r=162&amp;format=side&amp;path=/trunk/src/extras.js&amp;old_path=/trunk/src/extras.js&amp;old=161">Diff</a>
 <br>
 <pre class="ifOpened">--------------------

2008-04-13 [geoffrey.mcgill]
<a href="/p/datejs/source/detail?r=162">Revision #162</a>

...</pre>
 </div>
 
 <div class="closed" style="margin-bottom:3px;" >
 <img class="ifClosed" onclick="_toggleHidden(this)" src="http://www.gstatic.com/codesite/ph/images/plus.gif" >
 <img class="ifOpened" onclick="_toggleHidden(this)" src="http://www.gstatic.com/codesite/ph/images/minus.gif" >
 <a href="/p/datejs/source/detail?spec=svn197&r=161">r161</a>
 by ge...@coolite.com
 on Apr 13, 2008
 &nbsp; <a href="/p/datejs/source/diff?spec=svn197&r=161&amp;format=side&amp;path=/trunk/src/extras.js&amp;old_path=/trunk/src/extras.js&amp;old=160">Diff</a>
 <br>
 <pre class="ifOpened">[No log message]</pre>
 </div>
 
 <div class="closed" style="margin-bottom:3px;" >
 <img class="ifClosed" onclick="_toggleHidden(this)" src="http://www.gstatic.com/codesite/ph/images/plus.gif" >
 <img class="ifOpened" onclick="_toggleHidden(this)" src="http://www.gstatic.com/codesite/ph/images/minus.gif" >
 <a href="/p/datejs/source/detail?spec=svn197&r=160">r160</a>
 by ge...@coolite.com
 on Apr 12, 2008
 &nbsp; <a href="/p/datejs/source/diff?spec=svn197&r=160&amp;format=side&amp;path=/trunk/src/extras.js&amp;old_path=/trunk/src/extras.js&amp;old=155">Diff</a>
 <br>
 <pre class="ifOpened">[No log message]</pre>
 </div>
 
 
 <a href="/p/datejs/source/list?path=/trunk/src/extras.js&start=182">All revisions of this file</a>
 </div>
 </div>
 <div class="round1"></div>
 <div class="round2"></div>
 <div class="round4"></div>
 </div>
 
 <div class="pmeta_bubble_bg" style="border:1px solid white">
 <div class="round4"></div>
 <div class="round2"></div>
 <div class="round1"></div>
 <div class="box-inner">
 <div id="fileinfo_bubble">
 <p>File info</p>
 
 <div>Size: 17429 bytes,
 332 lines</div>
 
 <div><a href="//datejs.googlecode.com/svn/trunk/src/extras.js">View raw file</a></div>
 </div>
 
 </div>
 <div class="round1"></div>
 <div class="round2"></div>
 <div class="round4"></div>
 </div>
 </div>
 </div>


</div>

</div>
</div>

<script src="http://www.gstatic.com/codesite/ph/16186173366037945081/js/prettify/prettify.js"></script>
<script type="text/javascript">prettyPrint();</script>


<script src="http://www.gstatic.com/codesite/ph/16186173366037945081/js/source_file_scripts.js"></script>

 <script type="text/javascript" src="http://www.gstatic.com/codesite/ph/16186173366037945081/js/kibbles.js"></script>
 <script type="text/javascript">
 var lastStop = null;
 var initialized = false;
 
 function updateCursor(next, prev) {
 if (prev && prev.element) {
 prev.element.className = 'cursor_stop cursor_hidden';
 }
 if (next && next.element) {
 next.element.className = 'cursor_stop cursor';
 lastStop = next.index;
 }
 }
 
 function pubRevealed(data) {
 updateCursorForCell(data.cellId, 'cursor_stop cursor_hidden');
 if (initialized) {
 reloadCursors();
 }
 }
 
 function draftRevealed(data) {
 updateCursorForCell(data.cellId, 'cursor_stop cursor_hidden');
 if (initialized) {
 reloadCursors();
 }
 }
 
 function draftDestroyed(data) {
 updateCursorForCell(data.cellId, 'nocursor');
 if (initialized) {
 reloadCursors();
 }
 }
 function reloadCursors() {
 kibbles.skipper.reset();
 loadCursors();
 if (lastStop != null) {
 kibbles.skipper.setCurrentStop(lastStop);
 }
 }
 // possibly the simplest way to insert any newly added comments
 // is to update the class of the corresponding cursor row,
 // then refresh the entire list of rows.
 function updateCursorForCell(cellId, className) {
 var cell = document.getElementById(cellId);
 // we have to go two rows back to find the cursor location
 var row = getPreviousElement(cell.parentNode);
 row.className = className;
 }
 // returns the previous element, ignores text nodes.
 function getPreviousElement(e) {
 var element = e.previousSibling;
 if (element.nodeType == 3) {
 element = element.previousSibling;
 }
 if (element && element.tagName) {
 return element;
 }
 }
 function loadCursors() {
 // register our elements with skipper
 var elements = CR_getElements('*', 'cursor_stop');
 var len = elements.length;
 for (var i = 0; i < len; i++) {
 var element = elements[i]; 
 element.className = 'cursor_stop cursor_hidden';
 kibbles.skipper.append(element);
 }
 }
 function toggleComments() {
 CR_toggleCommentDisplay();
 reloadCursors();
 }
 function keysOnLoadHandler() {
 // setup skipper
 kibbles.skipper.addStopListener(
 kibbles.skipper.LISTENER_TYPE.PRE, updateCursor);
 // Set the 'offset' option to return the middle of the client area
 // an option can be a static value, or a callback
 kibbles.skipper.setOption('padding_top', 50);
 // Set the 'offset' option to return the middle of the client area
 // an option can be a static value, or a callback
 kibbles.skipper.setOption('padding_bottom', 100);
 // Register our keys
 kibbles.skipper.addFwdKey("n");
 kibbles.skipper.addRevKey("p");
 kibbles.keys.addKeyPressListener(
 'u', function() { window.location = detail_url; });
 kibbles.keys.addKeyPressListener(
 'r', function() { window.location = detail_url + '#publish'; });
 
 kibbles.keys.addKeyPressListener('j', gotoNextPage);
 kibbles.keys.addKeyPressListener('k', gotoPreviousPage);
 
 
 }
 </script>
<script src="http://www.gstatic.com/codesite/ph/16186173366037945081/js/code_review_scripts.js"></script>
<script type="text/javascript">
 function showPublishInstructions() {
 var element = document.getElementById('review_instr');
 if (element) {
 element.className = 'opened';
 }
 }
 var codereviews;
 function revsOnLoadHandler() {
 // register our source container with the commenting code
 var paths = {'svn197': '/trunk/src/extras.js'}
 codereviews = CR_controller.setup(
 {"profileUrl":["/u/108117439965498251840/"],"token":"uEF1Jv_VzL7TYQY41miDd4g5PfU:1347763369624","assetHostPath":"http://www.gstatic.com/codesite/ph","domainName":null,"assetVersionPath":"http://www.gstatic.com/codesite/ph/16186173366037945081","projectHomeUrl":"/p/datejs","relativeBaseUrl":"","projectName":"datejs","loggedInUserEmail":"toconuts@gmail.com"}, '', 'svn197', paths,
 CR_BrowseIntegrationFactory);
 
 codereviews.registerActivityListener(CR_ActivityType.REVEAL_DRAFT_PLATE, showPublishInstructions);
 
 codereviews.registerActivityListener(CR_ActivityType.REVEAL_PUB_PLATE, pubRevealed);
 codereviews.registerActivityListener(CR_ActivityType.REVEAL_DRAFT_PLATE, draftRevealed);
 codereviews.registerActivityListener(CR_ActivityType.DISCARD_DRAFT_COMMENT, draftDestroyed);
 
 
 
 
 
 
 
 var initialized = true;
 reloadCursors();
 }
 window.onload = function() {keysOnLoadHandler(); revsOnLoadHandler();};

</script>
<script type="text/javascript" src="http://www.gstatic.com/codesite/ph/16186173366037945081/js/dit_scripts.js"></script>

 
 
 
 <script type="text/javascript" src="http://www.gstatic.com/codesite/ph/16186173366037945081/js/ph_core.js"></script>
 
 
 
 
</div> 

<div id="footer" dir="ltr">
 <div class="text">
 <a href="/projecthosting/terms.html">Terms</a> -
 <a href="http://www.google.com/privacy.html">Privacy</a> -
 <a href="/p/support/">Project Hosting Help</a>
 </div>
</div>
 <div class="hostedBy" style="margin-top: -20px;">
 <span style="vertical-align: top;">Powered by <a href="http://code.google.com/projecthosting/">Google Project Hosting</a></span>
 </div>

 
 


 
 </body>
</html>

