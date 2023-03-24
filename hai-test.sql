/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 80032
 Source Host           : localhost:3306
 Source Schema         : hai-test

 Target Server Type    : MySQL
 Target Server Version : 80032
 File Encoding         : 65001

 Date: 24/03/2023 15:35:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of category
-- ----------------------------
BEGIN;
INSERT INTO `category` (`id`, `name`, `slug`, `deleted_at`, `created_at`, `updated_at`, `parent_id`) VALUES (1, 'Tin Tức', 'tin-tuc', NULL, '2022-11-11 10:27:01', '2022-11-11 10:27:01', NULL);
INSERT INTO `category` (`id`, `name`, `slug`, `deleted_at`, `created_at`, `updated_at`, `parent_id`) VALUES (2, 'Bao 24h', 'bao-24h', NULL, '2022-11-11 10:31:23', '2022-11-11 10:31:23', NULL);
INSERT INTO `category` (`id`, `name`, `slug`, `deleted_at`, `created_at`, `updated_at`, `parent_id`) VALUES (3, 'Bóng Đá', 'bong-da', NULL, '2022-11-11 10:56:47', '2022-11-11 10:56:47', NULL);
INSERT INTO `category` (`id`, `name`, `slug`, `deleted_at`, `created_at`, `updated_at`, `parent_id`) VALUES (4, 'Kinh Doanh', 'kinh-doanh', NULL, '2022-11-11 10:56:55', '2022-11-11 10:56:55', NULL);
INSERT INTO `category` (`id`, `name`, `slug`, `deleted_at`, `created_at`, `updated_at`, `parent_id`) VALUES (5, 'Sức Khoẻ', 'suc-khoe', NULL, '2022-11-11 10:57:17', '2022-11-11 10:57:17', NULL);
INSERT INTO `category` (`id`, `name`, `slug`, `deleted_at`, `created_at`, `updated_at`, `parent_id`) VALUES (6, 'Gải Trí', 'gai-tri', NULL, '2022-11-11 10:57:33', '2022-11-11 10:57:33', NULL);
INSERT INTO `category` (`id`, `name`, `slug`, `deleted_at`, `created_at`, `updated_at`, `parent_id`) VALUES (7, 'Phái Đẹp', 'phai-dep', NULL, '2022-11-11 10:57:40', '2022-11-11 10:57:40', NULL);
INSERT INTO `category` (`id`, `name`, `slug`, `deleted_at`, `created_at`, `updated_at`, `parent_id`) VALUES (8, 'bong da hay', 'bong-da-hay', NULL, '2022-11-11 15:51:50', '2022-11-11 15:51:50', 3);
INSERT INTO `category` (`id`, `name`, `slug`, `deleted_at`, `created_at`, `updated_at`, `parent_id`) VALUES (9, 'send-sms', 'send-sms', NULL, '2022-11-11 15:52:49', '2022-11-11 15:52:49', NULL);
INSERT INTO `category` (`id`, `name`, `slug`, `deleted_at`, `created_at`, `updated_at`, `parent_id`) VALUES (10, 'send sms sub', 'send-sms-sub', NULL, '2022-11-11 15:53:49', '2022-11-11 15:53:49', 9);
COMMIT;

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_posts` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_customer` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_id_posts_foreign` (`id_posts`),
  KEY `comment_id_customer_foreign` (`id_customer`),
  CONSTRAINT `comment_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comment_id_posts_foreign` FOREIGN KEY (`id_posts`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of comment
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of contact
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for crawlers
-- ----------------------------
DROP TABLE IF EXISTS `crawlers`;
CREATE TABLE `crawlers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `example` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of crawlers
-- ----------------------------
BEGIN;
INSERT INTO `crawlers` (`id`, `url`, `title`, `content`, `example`, `status`, `path`, `created_at`, `updated_at`) VALUES (1, NULL, 'Academic in a sentence', 'Synonym: academician, donnish, faculty member, pedantic. Similar words: epidemic, decade, chemical, a case in point, incommunicado, demand, dynamic, Islamic. Meaning: [‚ækə\'demɪk]  n. an educator who works at a college or university. adj. 1. associated with academia or an academy 2. hypothetical or theoretical and not expected to produce an immediate or practical result 3. marked by a narrow focus on or display of learning especially its trivial aspects. ', '[\"1. She chose an academic career.\",\"2. He launched a determined attack on academic criticism.\",\"3. The academic year commences at the beginning of October.\",\"4. I was never a particularly academic child.\",\"5. The enrolment criteria are geographical rather than academic.\",\"6. The school strives for academic excellence.\",\"7. A good historian must have an academic mind.\",\"(adsbygoogle = window.adsbygoogle || []).push({});\",\"8. He possessed no academic qualifications.\",\"9. The issue centers around academic freedom.\",\"10. It\'s becoming increasingly difficult to acquire academic tenure .\",\"11. The university is composed of five academic schools.\",\"12. The academic year is divided into two terms.\",\"13. All the candidates had excellent academic credentials.\",\"14. The issue centers round academic freedom.\",\"15. Other students may try to improve their academic performance by going to their summer schools.\",\"16. It\'s an academic transcript.\",\"17. Academic ability is not the sole criterion for admission to the college.\",\"18. Professor Greenan has a high standing in the academic world.\",\"19. Many of our teachers also have valuable academic links with Heidelberg University.\",\"20. She wasn\'t very academic and hated school.\",\"21. The author has settled for a more academic approach.\",\"22. He was a respected academic and above suspicion.\",\"23. He got top marks for overall academic performance.\",\"24. She\'s always shown an academic turn of mind.\",\"25. Her husband is a famous academic.\",\"26. The students return in October for the start of the new academic year.\",\"27. There is a close connection between family background and academic achievement.\",\"28. The university\'s exchange scheme for teachers has cemented its links with many other academic institutions.\",\"29. The students ought not to be compelled to go back of academic titles to find out what they mean.\",\"30. He spent the first twenty-five years of his priesthood as an academic.\",\"31. John had a long history of academic failure.\",\"32. It is a purely academic question.\",\"33. Her work is well thought of in academic circles.\",\"34. The distinction being made is purely academic.\",\"35. The children were ranked according to academic ability.\",\"36. Their great academic success was paraded as paradigmatic.\",\"37. Contact Dr. Gray about academic advisement.\",\"(adsbygoogle = window.adsbygoogle || []).push({});\",\"38. They followed her academic progress closely.\",\"39. The school is noted for its academic excellence.\",\"40. The book is a diatribe against the academic left.\",\"41. She\'s a past president of the academic committee.\",\"42. Their writings took powerful hold of academic circles.\",\"43. They established psychology as an academic discipline.\",\"44. His work is little known outside the academic sphere.\",\"44. Sentencedict.com is a sentence dictionary, on which you can find good sentences for a large number of words.\",\"45. Without academic freedom, we cannot do any research.\",\"46. The academic conference was hosted by our universtiy.\",\"47. Jennifer has an impressive academic and business background.\",\"48. Anecdotes have no place in an academic essay.\",\"49. He is unsuited to academic work.\",\"50. Her academic achievements don\'t amount to much.\",\"51. He has little repute as an academic.\",\"52. He\'s a popular child, but not very academic.\",\"53. The market for specialist academic books is pretty small.\",\"54. I\'d had enough of academic life.\",\"55. They attach too much weight to academic achievement.\",\"56. Her academic performance has been inconsistent.\",\"57. The academic year runs from October to June.\",\"58. A well-known academic will head the delegation.\",\"59. The course integrates academic study and practical training.\",\"60. That is merely an academic discussion.\",\"61. She doesn\'t fit the traditional mould of an academic.\",\"62. Private schools tend to stress the more academic subjects.\",\"63. She subscribes to quite a few academic journals.\",\"64. Their academic standards are high.\",\"65. She already has good academic qualifications under her belt.\",\"66. An American academic was expelled from the country yesterday.\",\"67. The whole thing\'s academic now-we can\'t win anyway.\",\"(adsbygoogle = window.adsbygoogle || []).push({});\",\"68. Do you have any teaching\\/legal\\/medical\\/secretarial\\/academic qualifications?\",\"69. Her academic credentials include an MA and a PhD.\",\"70. I have to plan my academic work very rigidly and set myself clear objectives.\",\"71. The question of where we go on holiday is purely academic since we don\'t have any money.\",\"72. It was all academic, because there were never any profits to share out.\",\"73. He is no longer in the race for academic awards.\",\"74. The change is part of the government\'s policy of phasing in Arabic as the official academic language.\",\"74. Wish you can benefit from our online sentence dictionary and make progress day by day!\",\"75. A financial scandal would shake the Institute\'s standing in the international academic community.\",\"76. I was terrible at school and left with few academic qualifications.\",\"77. At school his academic progress was hindered by a series of health problems.\",\"78. Such is the size of the problem that these arguments are purely academic.\",\"79. This is not a purely academic exercise: it should have a real impact on the way we work as a department.\",\"80. He reacquired an academic reputation after five years of hard work.\",\"81. The new recruits were drawn from a range of academic disciplines.\",\"82. The system is failing most disastrously among less academic children.\",\"83. Now the examination score serves as the only criterion for a student\'s academic performance.\",\"84. It takes time for the validity or fruitfulness of any academic development to become clear.\",\"85. Many employers consider hands-on experience to be as useful as academic qualifications.\",\"86. Students need to have time for relaxation and cultural activities , as well as for academic work.\",\"87. It\'s impossible to apply the same academic standards across the country.\",\"88. The secret police were determined to stamp out the last flickers of academic freedom.\",\"89. Academic success is not always an open sesame to a well-paid job.\",\"90. Actually, few of us admit that examinations can contribute anything really important to the students\' academic development.\",\"91. By the age of 21 he had already scaled the heights in the academic world.\",\"92. Academic staff are appointed on the recommendation of a committee.\",\"93. The young heroine steps into a web of intrigue in the academic world.\",\"94. Her academic qualifications are by the by. What we need is someone dynamic and creative.\",\"95. Consultants can help academic institutions to manage their resources more efficiently.\",\"96. The book is not intended for a purely academic audience.\",\"97. How could he apply his academic expertise to practical matters?\",\"(adsbygoogle = window.adsbygoogle || []).push({});\",\"98. There is a dichotomy between the academic world and the industrial world.\",\"99. People often described him as a bitter academic, but nothing could be further from the truth.\",\"100. Since the championship has already been decided, this match is of purely academic interest.\",\"101. Psychology began as a purely academic offshoot of natural philosophy.\",\"102. As well as a good academic record I look for people who\'ve climbed mountains or been captain of a team.\",\"103. The university is no longer the academic powerhouse that it once was.\",\"104. The project was under the direction of a well-known academic.\",\"105. There is a need for academic rigor in approaching this problem.\",\"106. There is a need for academic rigour in approaching this problem.\",\"107. His grand design was to connect up every academic institution in the world.\",\"108. Computer science is now a fully - fledged academic subject.\",\"109. Those are nice academic arguments[Sentencedict], but what about the immediate future?\",\"110. Henry generally stayed ahead of the others in the academic subjects.\",\"111. He believed that schools should be judged according to strictly academic criteria.\",\"112. Evidence of recent academic achievement is normally required.\",\"113. His academic record was unimpressive.\",\"114. Neither of them had pure academic interests.\",\"115. Does divorce interfere with academic achievement?\",\"116. They asked for academic freedom.\",\"117. Traditionally[sentencedict.com], professors were the heads of academic departments.\",\"118. Like professional courses, academic courses come in several sub-types.\",\"119. All will have a positive academic ability.\",\"120. There is much of it already in academic circles and also in business centers.\",\"121. We are able to identify absentees immediately and use the extra time to tackle the problem with academic counselling.\",\"122. Many such activities were organised this year in co-operation with academic departments.\",\"123. This principle is not the special prerogative of anthropology, and it transcends all the boundaries of traditional academic disciplines.\",\"124. Now, the latter three are clearly matters of academic freedom, given the way in which academic freedom is commonly understood.\",\"125. Today the aggressive presence of deconstructionism that shook up so many academic departments in the 1980s has receded.\",\"126. This is the academic discipline which is the intellectual concept of both theories and methods.\",\"127. Our academic institutions help to maintain a flow of the kind of cultural capital on which our wider social institutions are based.\",\"(adsbygoogle = window.adsbygoogle || []).push({});\",\"128. It should also be noted that many of these issues have not greatly exercised the academic community in this country.\",\"129. But now a new outlook is sweeping large segments of the academic community.\",\"130. We look forward to meeting you and wish you every success in your academic career.\",\"131. Their degree is evidence of their academic ability in a particular subject area.\",\"132. They have eliminated the general track and replaced low-level academic courses with ones that teach college-preparatory content in new ways.\",\"133. Virtually all of them see their academic institutions as complex social worlds with competing pressures and multiple tasks and goals.\",\"134. The categories in the framework supposedly can be applied to academic careers, roles, and the works of particular scholars.\",\"134. Sentencedict.com try its best to collect and build good sentences.\",\"135. Instead, there is always freshness and a delight in storytelling all too often absent from weighty academic history.\",\"136. The Bible is no academic tome with an esoteric appeal to those with scholarly minds who can handle abstract concepts.\",\"137. The study was conducted in a subregional radiotherapy centre and an academic department of gastroenterology and therapeutics.\",\"138. Hughes does not look very far for what is unique to sociology as an academic field of inquiry.\",\"139. Her academic field was ethno-psychology, and she had long been interested in the Caucasus and Transcaucasia.\",\"140. He must be able to place his subject both in the context of other academic disciplines and of society as a whole.\",\"141. As we saw earlier many of those interviewed had little traditional academic background having left school at an early age.\",\"142. And it makes obvious sense to say that autonomous institutions are not necessarily homes of academic freedom.\",\"143. The educative power of our academic institutions has never been lower: it is journalism that gives the lead.\",\"144. Henley hosts conferences to report research outcomes from both its own and the wider academic community.\",\"145. At the time Jane Gilbert told these stories, they were of more than academic interest to her.\",\"146. Parducci felt her dismissal violated her right to academic freedom.\",\"147. Is academic freedom the same in public schools and in colleges?\",\"148. Virtually every academic institution, it seemed, wanted a piece of the pie.\",\"149. These graced stately homes, were used in libraries and by those with a specific academic interest in botany or horticulture.\",\"150. The academic community was slower in rising to the challenge.\",\"151. This is entirely in keeping with the theoretical debate over academic freedom which we find in the literature.\",\"152. It makes it abundantly clear that even the possession and academic presentation of information necessary for an ethnography could be actionable.\",\"153. Because fraternities are privately owned and run, they are for the most part beyond the jurisdiction of academic institutions.\",\"154. It recently launched a program to cull the academic community for new technologies that will help ease the gridlock.\",\"155. The administrative breakdown of components in the academic career are: research, teaching, and community service.\",\"156. The groupings that form around academic disciplines are both cultures and anti-cultures.\",\"157. That is why the academic community has erected its appraisal systems, with anonymous referees and appraisers.\",\"(adsbygoogle = window.adsbygoogle || []).push({});\",\"158. Feminist scholars have shown how all academic disciplines have been dominated by a male view of the world.\",\"159. These supplement their core academic courses, which are taken with the rest of their classmates in the regular high school.\",\"160. On the other hand, some judges do not believe that academic freedom applies to public schools.\",\"161. Employers have until recently been kept at arms\' length and away from sensitive areas of involvement within academic institutions, including management.\",\"162. The curious thing is why a university made Mr Jeffries head of an academic department in the first place.\",\"163. The idea of each institution forming a coherent academic community seems to have little purchase in reality.\",\"164. The extent to which school-to-work can raise academic achievement is less clear.\",\"165. He also expressed his disappointment at the lack of support from his colleagues in academic circles.\",\"166. They should be able to offer you the support you need at an academic and personal level.\",\"167. The burden of the essay will be merely to indicate how voluntarism can succeed in academic circles.\",\"168. The reason can perhaps be found in the fact that company law as an academic discipline boasts no long and distinguished pedigree.\",\"169. Likewise[Sentencedict], early reading problems and low scores on achievement tests are often used as an indicator of anticipated weak academic achievement.\",\"170. After college, they moved on to literary and academic careers and began a rightward march through the 1940s and 1950s.\",\"171. A first approach to an entity model for an academic department of computer science is given in Figure 3.1.\",\"172. Candidates from government, commerce or academic backgrounds are invited to apply.\",\"173. In Petah Tikva my wife had just started a promising academic career.\",\"174. The performance itself was important, but it was almost of academic interest.\",\"175. Computing is a subject open to applicants from a wide range of academic backgrounds spanning the arts and sciences.\",\"176. A prevailing sense of relief and a chance for everyone to forge a career non-reliant on academic achievement.\",\"177. I made all kinds of friends. 1 learned academic discipline.\",\"178. A strong academic background, preferably an advanced degree in a relevant discipline.\",\"179. Core skills are those which are basic to all vocational and academic achievement.\",\"180. Money was certainly a major consideration, as were location and academic background.\",\"181. I used to think about an academic career when I was a student.\",\"182. He believes that industrialists have a lot to offer academic institutions in helping them to manage their resources.\",\"183. But he had a mild, good-humoured, articulate side, verging on the academic, abjuring the sensational.\",\"184. Criticism and debate are to be welcomed, however, and should not be confined to academic circles.\",\"185. Rivers played a fundamental role in the establishment of both experimental psychology and social anthropology as academic disciplines in Great Britain.\",\"186. His academic background includes the study of law at Harvard.\",\"187. Near facilitates the rapid transfer of information about attacks on academics and academic freedom on a global basis.\",\"(adsbygoogle = window.adsbygoogle || []).push({});\",\"188. We have described two uses of the survey method which originated outside academic circles.\",\"189. The first provides a more general form of academic course than the specialized academic degrees described above.\",\"190. There simply is no replacement for a rigorous(sentencedict.com), carefully planned sequence of academic course work.\",\"191. The Delegates meet at intervals to determine policy, in particular publishing policy in the academic field.\",\"192. The article illustrates at least three important issues confronting many academic institutions.\",\"193. They direct and coordinate activities of deans of individual colleges and chairpersons of academic departments.\",\"194. My literary and academic background was something, I often felt, I was expected to apologise for.\",\"195. Only in their most elementary courses do other academic fields offer even a partial parallel.\",\"196. It follows that the academic community and research are directly interrelated.\",\"197. The serious charge that academic freedom was violated on his campus has yet to be addressed.\",\"198. He began his academic career as a physiologist and pharmacologist.\",\"198. Sentencedict.com try its best to collect and build good sentences.\",\"199. High school students can select from a variety of applied academic courses in addition to a more traditional college-preparatory curriculum.\",\"200. Such staff usually have a close relationship with the academic departments.\",\"201. Attention is turned away from the academic field rather than inward.\",\"202. His is the remarkable story of a young man with hardly any academic ability.\",\"203. Postgraduate and post-experience diplomas and certificates are, in general, designed for students with a wider range of academic backgrounds and experience.\",\"204. The students were chosen because of their strong leadership potential, academic achievement and involvement in extracurricular activities.\",\"205. Mr. Sayeed Does my hon. Friend agree that assessing ability only in terms of academic achievement sells young people short?\"]', NULL, NULL, '2022-12-06 02:36:34', '2022-12-06 02:36:34');
INSERT INTO `crawlers` (`id`, `url`, `title`, `content`, `example`, `status`, `path`, `created_at`, `updated_at`) VALUES (2, NULL, 'Academic in a sentence', 'Synonym: academician, donnish, faculty member, pedantic. Similar words: epidemic, decade, chemical, a case in point, incommunicado, demand, dynamic, Islamic. Meaning: [‚ækə\'demɪk]  n. an educator who works at a college or university. adj. 1. associated with academia or an academy 2. hypothetical or theoretical and not expected to produce an immediate or practical result 3. marked by a narrow focus on or display of learning especially its trivial aspects. ', '[\"1. She chose an academic career.\",\"2. He launched a determined attack on academic criticism.\",\"3. The academic year commences at the beginning of October.\",\"4. I was never a particularly academic child.\",\"5. The enrolment criteria are geographical rather than academic.\",\"6. The school strives for academic excellence.\",\"7. A good historian must have an academic mind.\",\"(adsbygoogle = window.adsbygoogle || []).push({});\",\"8. He possessed no academic qualifications.\",\"9. The issue centers around academic freedom.\",\"10. It\'s becoming increasingly difficult to acquire academic tenure .\",\"11. The university is composed of five academic schools.\",\"12. The academic year is divided into two terms.\",\"13. All the candidates had excellent academic credentials.\",\"14. The issue centers round academic freedom.\",\"15. Other students may try to improve their academic performance by going to their summer schools.\",\"16. It\'s an academic transcript.\",\"17. Academic ability is not the sole criterion for admission to the college.\",\"18. Professor Greenan has a high standing in the academic world.\",\"19. Many of our teachers also have valuable academic links with Heidelberg University.\",\"20. She wasn\'t very academic and hated school.\",\"21. The author has settled for a more academic approach.\",\"22. He was a respected academic and above suspicion.\",\"23. He got top marks for overall academic performance.\",\"24. She\'s always shown an academic turn of mind.\",\"25. Her husband is a famous academic.\",\"26. The students return in October for the start of the new academic year.\",\"27. There is a close connection between family background and academic achievement.\",\"28. The university\'s exchange scheme for teachers has cemented its links with many other academic institutions.\",\"29. The students ought not to be compelled to go back of academic titles to find out what they mean.\",\"30. He spent the first twenty-five years of his priesthood as an academic.\",\"31. John had a long history of academic failure.\",\"32. It is a purely academic question.\",\"33. Her work is well thought of in academic circles.\",\"34. The distinction being made is purely academic.\",\"35. The children were ranked according to academic ability.\",\"36. Their great academic success was paraded as paradigmatic.\",\"37. Contact Dr. Gray about academic advisement.\",\"(adsbygoogle = window.adsbygoogle || []).push({});\",\"38. They followed her academic progress closely.\",\"39. The school is noted for its academic excellence.\",\"40. The book is a diatribe against the academic left.\",\"41. She\'s a past president of the academic committee.\",\"42. Their writings took powerful hold of academic circles.\",\"43. They established psychology as an academic discipline.\",\"44. His work is little known outside the academic sphere.\",\"44. Sentencedict.com is a sentence dictionary, on which you can find good sentences for a large number of words.\",\"45. Without academic freedom, we cannot do any research.\",\"46. The academic conference was hosted by our universtiy.\",\"47. Jennifer has an impressive academic and business background.\",\"48. Anecdotes have no place in an academic essay.\",\"49. He is unsuited to academic work.\",\"50. Her academic achievements don\'t amount to much.\",\"51. He has little repute as an academic.\",\"52. He\'s a popular child, but not very academic.\",\"53. The market for specialist academic books is pretty small.\",\"54. I\'d had enough of academic life.\",\"55. They attach too much weight to academic achievement.\",\"56. Her academic performance has been inconsistent.\",\"57. The academic year runs from October to June.\",\"58. A well-known academic will head the delegation.\",\"59. The course integrates academic study and practical training.\",\"60. That is merely an academic discussion.\",\"61. She doesn\'t fit the traditional mould of an academic.\",\"62. Private schools tend to stress the more academic subjects.\",\"63. She subscribes to quite a few academic journals.\",\"64. Their academic standards are high.\",\"65. She already has good academic qualifications under her belt.\",\"66. An American academic was expelled from the country yesterday.\",\"67. The whole thing\'s academic now-we can\'t win anyway.\",\"(adsbygoogle = window.adsbygoogle || []).push({});\",\"68. Do you have any teaching\\/legal\\/medical\\/secretarial\\/academic qualifications?\",\"69. Her academic credentials include an MA and a PhD.\",\"70. I have to plan my academic work very rigidly and set myself clear objectives.\",\"71. The question of where we go on holiday is purely academic since we don\'t have any money.\",\"72. It was all academic, because there were never any profits to share out.\",\"73. He is no longer in the race for academic awards.\",\"74. The change is part of the government\'s policy of phasing in Arabic as the official academic language.\",\"74. Wish you can benefit from our online sentence dictionary and make progress day by day!\",\"75. A financial scandal would shake the Institute\'s standing in the international academic community.\",\"76. I was terrible at school and left with few academic qualifications.\",\"77. At school his academic progress was hindered by a series of health problems.\",\"78. Such is the size of the problem that these arguments are purely academic.\",\"79. This is not a purely academic exercise: it should have a real impact on the way we work as a department.\",\"80. He reacquired an academic reputation after five years of hard work.\",\"81. The new recruits were drawn from a range of academic disciplines.\",\"82. The system is failing most disastrously among less academic children.\",\"83. Now the examination score serves as the only criterion for a student\'s academic performance.\",\"84. It takes time for the validity or fruitfulness of any academic development to become clear.\",\"85. Many employers consider hands-on experience to be as useful as academic qualifications.\",\"86. Students need to have time for relaxation and cultural activities , as well as for academic work.\",\"87. It\'s impossible to apply the same academic standards across the country.\",\"88. The secret police were determined to stamp out the last flickers of academic freedom.\",\"89. Academic success is not always an open sesame to a well-paid job.\",\"90. Actually, few of us admit that examinations can contribute anything really important to the students\' academic development.\",\"91. By the age of 21 he had already scaled the heights in the academic world.\",\"92. Academic staff are appointed on the recommendation of a committee.\",\"93. The young heroine steps into a web of intrigue in the academic world.\",\"94. Her academic qualifications are by the by. What we need is someone dynamic and creative.\",\"95. Consultants can help academic institutions to manage their resources more efficiently.\",\"96. The book is not intended for a purely academic audience.\",\"97. How could he apply his academic expertise to practical matters?\",\"(adsbygoogle = window.adsbygoogle || []).push({});\",\"98. There is a dichotomy between the academic world and the industrial world.\",\"99. People often described him as a bitter academic, but nothing could be further from the truth.\",\"100. Since the championship has already been decided, this match is of purely academic interest.\",\"101. Psychology began as a purely academic offshoot of natural philosophy.\",\"102. As well as a good academic record I look for people who\'ve climbed mountains or been captain of a team.\",\"103. The university is no longer the academic powerhouse that it once was.\",\"104. The project was under the direction of a well-known academic.\",\"105. There is a need for academic rigor in approaching this problem.\",\"106. There is a need for academic rigour in approaching this problem.\",\"107. His grand design was to connect up every academic institution in the world.\",\"108. Computer science is now a fully - fledged academic subject.\",\"109. Those are nice academic arguments[Sentencedict], but what about the immediate future?\",\"110. Henry generally stayed ahead of the others in the academic subjects.\",\"111. He believed that schools should be judged according to strictly academic criteria.\",\"112. Evidence of recent academic achievement is normally required.\",\"113. His academic record was unimpressive.\",\"114. Neither of them had pure academic interests.\",\"115. Does divorce interfere with academic achievement?\",\"116. They asked for academic freedom.\",\"117. Traditionally, professors were the heads of academic departments.\",\"118. Like professional courses, academic courses come in several sub-types.\",\"119. All will have a positive academic ability.\",\"120. There is much of it already in academic circles and also in business centers.\",\"121. We are able to identify absentees immediately and use the extra time to tackle the problem with academic counselling.\",\"122. Many such activities were organised this year in co-operation with academic departments.\",\"123. This principle is not the special prerogative of anthropology, and it transcends all the boundaries of traditional academic disciplines.\",\"124. Now, the latter three are clearly matters of academic freedom, given the way in which academic freedom is commonly understood.\",\"125. Today the aggressive presence of deconstructionism that shook up so many academic departments in the 1980s has receded.\",\"126. This is the academic discipline which is the intellectual concept of both theories and methods.\",\"127. Our academic institutions help to maintain a flow of the kind of cultural capital on which our wider social institutions are based.\",\"(adsbygoogle = window.adsbygoogle || []).push({});\",\"128. It should also be noted that many of these issues have not greatly exercised the academic community in this country.\",\"129. But now a new outlook is sweeping large segments of the academic community.\",\"130. We look forward to meeting you and wish you every success in your academic career.\",\"131. Their degree is evidence of their academic ability in a particular subject area.\",\"132. They have eliminated the general track and replaced low-level academic courses with ones that teach college-preparatory content in new ways.\",\"133. Virtually all of them see their academic institutions as complex social worlds with competing pressures and multiple tasks and goals.\",\"134. The categories in the framework supposedly can be applied to academic careers, roles, and the works of particular scholars.\",\"134. Sentencedict.com try its best to collect and build good sentences.\",\"135. Instead, there is always freshness and a delight in storytelling all too often absent from weighty academic history.\",\"136. The Bible is no academic tome with an esoteric appeal to those with scholarly minds who can handle abstract concepts.\",\"137. The study was conducted in a subregional radiotherapy centre and an academic department of gastroenterology and therapeutics.\",\"138. Hughes does not look very far for what is unique to sociology as an academic field of inquiry.\",\"139. Her academic field was ethno-psychology, and she had long been interested in the Caucasus and Transcaucasia.\",\"140. He must be able to place his subject both in the context of other academic disciplines and of society as a whole.\",\"141. As we saw earlier many of those interviewed had little traditional academic background having left school at an early age.\",\"142. And it makes obvious sense to say that autonomous institutions are not necessarily homes of academic freedom.\",\"143. The educative power of our academic institutions has never been lower: it is journalism that gives the lead.\",\"144. Henley hosts conferences to report research outcomes from both its own and the wider academic community.\",\"145. At the time Jane Gilbert told these stories, they were of more than academic interest to her.\",\"146. Parducci felt her dismissal violated her right to academic freedom.\",\"147. Is academic freedom the same in public schools and in colleges?\",\"148. Virtually every academic institution, it seemed, wanted a piece of the pie.\",\"149. These graced stately homes, were used in libraries and by those with a specific academic interest in botany or horticulture.\",\"150. The academic community was slower in rising to the challenge.\",\"151. This is entirely in keeping with the theoretical debate over academic freedom which we find in the literature.\",\"152. It makes it abundantly clear that even the possession and academic presentation of information necessary for an ethnography could be actionable.\",\"153. Because fraternities are privately owned and run, they are for the most part beyond the jurisdiction of academic institutions.\",\"154. It recently launched a program to cull the academic community for new technologies that will help ease the gridlock.\",\"155. The administrative breakdown of components in the academic career are: research, teaching, and community service.\",\"156. The groupings that form around academic disciplines are both cultures and anti-cultures.\",\"157. That is why the academic community has erected its appraisal systems, with anonymous referees and appraisers.\",\"(adsbygoogle = window.adsbygoogle || []).push({});\",\"158. Feminist scholars have shown how all academic disciplines have been dominated by a male view of the world.\",\"159. These supplement their core academic courses, which are taken with the rest of their classmates in the regular high school.\",\"160. On the other hand, some judges do not believe that academic freedom applies to public schools.\",\"161. Employers have until recently been kept at arms\' length and away from sensitive areas of involvement within academic institutions, including management.\",\"162. The curious thing is why a university made Mr Jeffries head of an academic department in the first place.\",\"163. The idea of each institution forming a coherent academic community seems to have little purchase in reality.\",\"164. The extent to which school-to-work can raise academic achievement is less clear.\",\"165. He also expressed his disappointment at the lack of support from his colleagues in academic circles.\",\"166. They should be able to offer you the support you need at an academic and personal level.\",\"167. The burden of the essay will be merely to indicate how voluntarism can succeed in academic circles.\",\"168. The reason can perhaps be found in the fact that company law as an academic discipline boasts no long and distinguished pedigree.\",\"169. Likewise[Sentencedict], early reading problems and low scores on achievement tests are often used as an indicator of anticipated weak academic achievement.\",\"170. After college, they moved on to literary and academic careers and began a rightward march through the 1940s and 1950s.\",\"171. A first approach to an entity model for an academic department of computer science is given in Figure 3.1.\",\"172. Candidates from government, commerce or academic backgrounds are invited to apply.\",\"173. In Petah Tikva my wife had just started a promising academic career.\",\"174. The performance itself was important, but it was almost of academic interest.\",\"175. Computing is a subject open to applicants from a wide range of academic backgrounds spanning the arts and sciences.\",\"176. A prevailing sense of relief and a chance for everyone to forge a career non-reliant on academic achievement.\",\"177. I made all kinds of friends. 1 learned academic discipline.\",\"178. A strong academic background, preferably an advanced degree in a relevant discipline.\",\"179. Core skills are those which are basic to all vocational and academic achievement.\",\"180. Money was certainly a major consideration, as were location and academic background.\",\"181. I used to think about an academic career when I was a student.\",\"182. He believes that industrialists have a lot to offer academic institutions in helping them to manage their resources.\",\"183. But he had a mild, good-humoured, articulate side, verging on the academic, abjuring the sensational.\",\"184. Criticism and debate are to be welcomed, however, and should not be confined to academic circles.\",\"185. Rivers played a fundamental role in the establishment of both experimental psychology and social anthropology as academic disciplines in Great Britain.\",\"186. His academic background includes the study of law at Harvard.\",\"187. Near facilitates the rapid transfer of information about attacks on academics and academic freedom on a global basis.\",\"(adsbygoogle = window.adsbygoogle || []).push({});\",\"188. We have described two uses of the survey method which originated outside academic circles.\",\"189. The first provides a more general form of academic course than the specialized academic degrees described above.\",\"190. There simply is no replacement for a rigorous[sentencedict.com], carefully planned sequence of academic course work.\",\"191. The Delegates meet at intervals to determine policy, in particular publishing policy in the academic field.\",\"192. The article illustrates at least three important issues confronting many academic institutions.\",\"193. They direct and coordinate activities of deans of individual colleges and chairpersons of academic departments.\",\"194. My literary and academic background was something, I often felt, I was expected to apologise for.\",\"195. Only in their most elementary courses do other academic fields offer even a partial parallel.\",\"196. It follows that the academic community and research are directly interrelated.\",\"197. The serious charge that academic freedom was violated on his campus has yet to be addressed.\",\"198. He began his academic career as a physiologist and pharmacologist.\",\"198. Sentencedict.com try its best to collect and build good sentences.\",\"199. High school students can select from a variety of applied academic courses in addition to a more traditional college-preparatory curriculum.\",\"200. Such staff usually have a close relationship with the academic departments.\",\"201. Attention is turned away from the academic field rather than inward.\",\"202. His is the remarkable story of a young man with hardly any academic ability.\",\"203. Postgraduate and post-experience diplomas and certificates are, in general, designed for students with a wider range of academic backgrounds and experience.\",\"204. The students were chosen because of their strong leadership potential, academic achievement and involvement in extracurricular activities.\",\"205. Mr. Sayeed Does my hon. Friend agree that assessing ability only in terms of academic achievement sells young people short?\"]', NULL, NULL, '2022-12-06 04:10:58', '2022-12-06 04:10:58');
INSERT INTO `crawlers` (`id`, `url`, `title`, `content`, `example`, `status`, `path`, `created_at`, `updated_at`) VALUES (3, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-07 02:11:43', '2022-12-07 02:11:43');
COMMIT;

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of customer
-- ----------------------------
BEGIN;
INSERT INTO `customer` (`id`, `name`, `email`, `password`, `provider_name`, `provider_id`, `avatar`, `deleted_at`, `created_at`, `updated_at`) VALUES (1, 'Hải Đinh', 'dinhngochai1900@gmail.com', '$2y$10$F0O2w7E5SPHXFIYO4Sqo1eBGY1Tpf5vjsB2m80SQjhcphtLk8wemG', 'google', '113377167492420812749', 'https://lh3.googleusercontent.com/a/ALm5wu0F6TVCgdE--Hk_S9ZbAHpJG_k77T6mgBMvcx_O=s96-c', NULL, '2022-11-11 10:34:39', '2022-11-11 10:34:39');
INSERT INTO `customer` (`id`, `name`, `email`, `password`, `provider_name`, `provider_id`, `avatar`, `deleted_at`, `created_at`, `updated_at`) VALUES (2, 'Sae Jan', 'dinhngochai573@gmail.com', '$2y$10$2ciNrUGhzdzvS/iD8Z3Wd.cA4ZCZBUlCI4RcNpQD7jMeWvgJUxCwe', 'google', '116334565419387352677', 'https://lh3.googleusercontent.com/a/AEdFTp6xY1q1CkTrUygHXRT7xCOP3cKHimHd5Qr-kMs14w=s96-c', NULL, '2023-01-16 03:54:41', '2023-01-16 03:54:41');
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES (1, 'bce901b6-a2ad-40c6-a0a8-6bbc32f1f740', 'database', 'default', '{\"uuid\":\"bce901b6-a2ad-40c6-a0a8-6bbc32f1f740\",\"displayName\":\"App\\\\Jobs\\\\NewJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\NewJob\",\"command\":\"O:15:\\\"App\\\\Jobs\\\\NewJob\\\":1:{s:7:\\\"\\u0000*\\u0000page\\\";i:693;}\"}}', 'Illuminate\\Queue\\MaxAttemptsExceededException: App\\Jobs\\NewJob has been attempted too many times or run too long. The job may have previously timed out. in /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/vendor/laravel/framework/src/Illuminate/Queue/Worker.php:755\nStack trace:\n#0 /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(505): Illuminate\\Queue\\Worker->maxAttemptsExceededException(Object(Illuminate\\Queue\\Jobs\\DatabaseJob))\n#1 /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(415): Illuminate\\Queue\\Worker->markJobAsFailedIfAlreadyExceedsMaxAttempts(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), 1)\n#2 /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(375): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#3 /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(326): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#4 /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(150): Illuminate\\Queue\\Worker->runNextJob(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#5 /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(134): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#6 /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#7 /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/vendor/laravel/framework/src/Illuminate/Container/Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#8 /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#9 /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#10 /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/vendor/laravel/framework/src/Illuminate/Container/Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#11 /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/vendor/laravel/framework/src/Illuminate/Console/Command.php(144): Illuminate\\Container\\Container->call(Array)\n#12 /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/vendor/symfony/console/Command/Command.php(291): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#13 /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/vendor/laravel/framework/src/Illuminate/Console/Command.php(126): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#14 /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/vendor/symfony/console/Application.php(1002): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#15 /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/vendor/symfony/console/Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#16 /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/vendor/symfony/console/Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#17 /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/vendor/laravel/framework/src/Illuminate/Console/Application.php(102): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#18 /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(151): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#19 /Users/dinhngochai/Desktop/SIS/hai-test/hoc-laravel/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#20 {main}', '2022-12-12 03:38:47');
COMMIT;

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of jobs
-- ----------------------------
BEGIN;
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES (3, 'default', '{\"uuid\":\"a39f97c7-32bb-4abf-9117-f063d6a6a847\",\"displayName\":\"App\\\\Jobs\\\\NewJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\NewJob\",\"command\":\"O:15:\\\"App\\\\Jobs\\\\NewJob\\\":0:{}\"}}', 0, NULL, 1670836934, 1670836934);
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES (4, 'default', '{\"uuid\":\"1d929d76-e6b8-4d4b-8577-ebe4a892273b\",\"displayName\":\"App\\\\Jobs\\\\NewJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\NewJob\",\"command\":\"O:15:\\\"App\\\\Jobs\\\\NewJob\\\":0:{}\"}}', 0, NULL, 1670836943, 1670836943);
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES (5, 'default', '{\"uuid\":\"427aebe2-5aa0-4b51-aea1-a4b87d6bc7b5\",\"displayName\":\"App\\\\Jobs\\\\CrawlersJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CrawlersJob\",\"command\":\"O:20:\\\"App\\\\Jobs\\\\CrawlersJob\\\":0:{}\"}}', 0, NULL, 1670837250, 1670837250);
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES (6, 'default', '{\"uuid\":\"75c8b339-ab63-4b6f-9937-204a36ba42c7\",\"displayName\":\"App\\\\Jobs\\\\CrawlersJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\CrawlersJob\",\"command\":\"O:20:\\\"App\\\\Jobs\\\\CrawlersJob\\\":0:{}\"}}', 0, NULL, 1670837272, 1670837272);
COMMIT;

-- ----------------------------
-- Table structure for likes
-- ----------------------------
DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `like` int NOT NULL DEFAULT '0',
  `customer_id` int unsigned DEFAULT NULL,
  `post_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `likes_customer_id_foreign` (`customer_id`),
  KEY `likes_post_id_foreign` (`post_id`),
  CONSTRAINT `likes_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE,
  CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of likes
-- ----------------------------
BEGIN;
INSERT INTO `likes` (`id`, `like`, `customer_id`, `post_id`, `created_at`, `updated_at`) VALUES (1, 1, 1, 4, '2022-11-11 15:41:53', '2023-01-16 03:55:33');
INSERT INTO `likes` (`id`, `like`, `customer_id`, `post_id`, `created_at`, `updated_at`) VALUES (2, 1, 1, 2, '2022-11-11 15:42:01', '2022-11-11 15:42:01');
INSERT INTO `likes` (`id`, `like`, `customer_id`, `post_id`, `created_at`, `updated_at`) VALUES (3, 1, 1, 5, '2022-11-11 15:42:15', '2023-01-16 03:55:30');
INSERT INTO `likes` (`id`, `like`, `customer_id`, `post_id`, `created_at`, `updated_at`) VALUES (4, 1, 2, 7, '2023-01-16 03:55:14', '2023-01-16 03:55:23');
INSERT INTO `likes` (`id`, `like`, `customer_id`, `post_id`, `created_at`, `updated_at`) VALUES (5, 1, 2, 6, '2023-01-16 03:55:25', '2023-01-16 03:55:25');
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4, '2021_07_20_063020_create_category_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5, '2021_07_20_063204_create_posts_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (6, '2021_07_20_063235_create_comment_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (7, '2021_07_24_135404_add_posts_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8, '2021_07_29_124426_create_subcategory_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (9, '2021_07_29_124537_create_contact_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (10, '2021_07_30_084420_create_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (11, '2021_07_31_131949_create_customer_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (12, '2021_08_02_025010_add_votes_to_comment_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (13, '2021_08_03_135621_add_votes_to_posts_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (14, '2021_08_04_024253_add_votes_posts_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (15, '2021_08_10_072343_add_votes_category_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (16, '2021_08_21_080346_create_permissions_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (17, '2021_08_21_080409_create_roles_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (18, '2021_08_21_080707_create_users_permissions_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (19, '2021_08_21_080959_create_users_roles_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (20, '2021_08_21_081158_create_roles_permissions_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (21, '2021_08_27_153052_like', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (22, '2021_09_14_071911_add_to_posts_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (23, '2021_09_14_075510_ad_to_posts_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (24, '2019_12_14_000001_create_personal_access_tokens_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (25, '2022_10_16_021949_create_products_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (26, '2022_12_06_015935_create_table_crawlers_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (27, '2021_03_31_112154_create_model_actions_table', 3);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (28, '2016_06_01_000001_create_oauth_auth_codes_table', 4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (29, '2016_06_01_000002_create_oauth_access_tokens_table', 4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (30, '2016_06_01_000003_create_oauth_refresh_tokens_table', 4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (31, '2016_06_01_000004_create_oauth_clients_table', 4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (32, '2016_06_01_000005_create_oauth_personal_access_clients_table', 4);
COMMIT;

-- ----------------------------
-- Table structure for model_actions
-- ----------------------------
DROP TABLE IF EXISTS `model_actions`;
CREATE TABLE `model_actions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `model` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `models` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_actions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for oauth_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `client_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_access_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for oauth_auth_codes
-- ----------------------------
DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `client_id` bigint unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_auth_codes
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for oauth_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_clients
-- ----------------------------
BEGIN;
INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES (1, NULL, 'Laravel Password Grant Client', 'erNxbp7BwRRkKD7xZBiielGkWQhA4HKMOU0FEjBW', 'customer', 'http://localhost', 0, 1, 0, '2023-03-14 13:59:39', '2023-03-14 13:59:39');
COMMIT;

-- ----------------------------
-- Table structure for oauth_personal_access_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_personal_access_clients
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for oauth_refresh_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_refresh_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `id_category` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sort` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_status` int NOT NULL DEFAULT '2',
  `count_view` int NOT NULL DEFAULT '0',
  `id_customer` int unsigned DEFAULT NULL,
  `id_subcategory` int unsigned DEFAULT NULL,
  `status_schedule` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_id_category_foreign` (`id_category`),
  KEY `posts_id_customer_foreign` (`id_customer`),
  CONSTRAINT `posts_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `posts_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of posts
-- ----------------------------
BEGIN;
INSERT INTO `posts` (`id`, `title`, `description`, `content`, `image`, `slug`, `status`, `id_category`, `created_at`, `updated_at`, `deleted_at`, `sort`, `customer_status`, `count_view`, `id_customer`, `id_subcategory`, `status_schedule`, `publish_at`) VALUES (1, 'sadas', 'asdas', '<p>asdas</p>', '310114697_1306775993388972_1847801257996719747_n_1668162472.jpeg', 'asdassadas', 1, 1, '2022-11-11 10:27:52', '2022-11-11 10:27:52', NULL, NULL, 2, 0, NULL, NULL, NULL, NULL);
INSERT INTO `posts` (`id`, `title`, `description`, `content`, `image`, `slug`, `status`, `id_category`, `created_at`, `updated_at`, `deleted_at`, `sort`, `customer_status`, `count_view`, `id_customer`, `id_subcategory`, `status_schedule`, `publish_at`) VALUES (2, 'covid-19', 'asdas', '<p>wqewqeqw</p>', '307204971_1227319314717566_3217818371146863836_n_1668163517.jpg', 'covid-19', 1, 2, '2022-11-11 10:45:17', '2023-01-16 03:55:37', NULL, NULL, 2, 2, NULL, NULL, 'public', NULL);
INSERT INTO `posts` (`id`, `title`, `description`, `content`, `image`, `slug`, `status`, `id_category`, `created_at`, `updated_at`, `deleted_at`, `sort`, `customer_status`, `count_view`, `id_customer`, `id_subcategory`, `status_schedule`, `publish_at`) VALUES (3, 'sdas', 'asdsa', '<p>asdas</p>', '307204971_1227319314717566_3217818371146863836_n_1668163566.jpg', 'sdas', 1, 3, '2022-11-11 10:46:06', '2022-11-11 10:46:06', NULL, NULL, 2, 0, NULL, NULL, 'public', NULL);
INSERT INTO `posts` (`id`, `title`, `description`, `content`, `image`, `slug`, `status`, `id_category`, `created_at`, `updated_at`, `deleted_at`, `sort`, `customer_status`, `count_view`, `id_customer`, `id_subcategory`, `status_schedule`, `publish_at`) VALUES (4, 'saasdasasdas', 'asdas', '<p>asdasd</p>', 'z3681770609017_7d7af6bf5471761db51385296e5c9695_1668163746.jpg', 'saasdasasdas', 1, 4, '2022-11-11 10:49:06', '2023-03-24 08:24:14', NULL, NULL, 2, 3, NULL, NULL, 'public', NULL);
INSERT INTO `posts` (`id`, `title`, `description`, `content`, `image`, `slug`, `status`, `id_category`, `created_at`, `updated_at`, `deleted_at`, `sort`, `customer_status`, `count_view`, `id_customer`, `id_subcategory`, `status_schedule`, `publish_at`) VALUES (5, 'sadas', 'asdas', '<p>sadas</p>', '309558445_647280106968208_5478622834329261200_n_1668163781.jpg', 'sadas', 1, 5, '2022-11-11 10:49:41', '2023-03-13 15:13:58', NULL, NULL, 2, 4, NULL, NULL, 'public', NULL);
INSERT INTO `posts` (`id`, `title`, `description`, `content`, `image`, `slug`, `status`, `id_category`, `created_at`, `updated_at`, `deleted_at`, `sort`, `customer_status`, `count_view`, `id_customer`, `id_subcategory`, `status_schedule`, `publish_at`) VALUES (6, 'sadas', 'sadasdas', '<p>asdasda</p>', '309558445_647280106968208_5478622834329261200_n_1668163807.jpg', 'sadas', 1, 6, '2022-11-11 10:50:07', '2022-11-11 10:50:07', NULL, NULL, 2, 0, NULL, NULL, 'public', NULL);
INSERT INTO `posts` (`id`, `title`, `description`, `content`, `image`, `slug`, `status`, `id_category`, `created_at`, `updated_at`, `deleted_at`, `sort`, `customer_status`, `count_view`, `id_customer`, `id_subcategory`, `status_schedule`, `publish_at`) VALUES (7, 'world cup 2022', 'hai dz bong da gioi', '<p>asdasdasdas</p>', '310114697_1306775993388972_1847801257996719747_n_1668181615.jpeg', 'world-cup-2022', 1, 7, '2022-11-11 15:46:55', '2023-03-24 08:24:19', NULL, NULL, 2, 2, NULL, NULL, 'public', NULL);
INSERT INTO `posts` (`id`, `title`, `description`, `content`, `image`, `slug`, `status`, `id_category`, `created_at`, `updated_at`, `deleted_at`, `sort`, `customer_status`, `count_view`, `id_customer`, `id_subcategory`, `status_schedule`, `publish_at`) VALUES (8, 'hai-dz', 'sadasdas', '<p>asdasdasdas</p>', '310114697_1306775993388972_1847801257996719747_n_1668181766.jpeg', 'hai-dz', 2, 8, '2022-11-11 15:49:26', '2022-11-11 15:49:26', NULL, NULL, 2, 0, 1, NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for roles_permissions
-- ----------------------------
DROP TABLE IF EXISTS `roles_permissions`;
CREATE TABLE `roles_permissions` (
  `role_id` bigint unsigned NOT NULL,
  `permission_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`),
  KEY `roles_permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `roles_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `roles_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles_permissions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for subcategory
-- ----------------------------
DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE `subcategory` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subcategory_category_id_foreign` (`category_id`),
  CONSTRAINT `subcategory_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of subcategory
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES (50, 'hai', 'hai11212sdas22@gmail.com', NULL, '$2y$10$dnqwW.GsVQ9p2qvCJ5cjfeXD4923FdXa3nRJwOUVlRoit.ocfA99O', NULL, '2023-02-03 11:28:53', '2023-02-03 11:28:53', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES (51, 'hai', 'hai11212112sdas22@gmail.com', NULL, '$2y$10$mhizv7J5xmWOP/GT5fChr.MybLWBsrdOH.wzR0Np9hIP7ft4R0oxS', NULL, '2023-02-03 11:29:02', '2023-02-03 11:29:02', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES (53, 'hai', 'ha111i11212112sdas22@gmail.com', NULL, '$2y$10$OKEKE9MDvevpN4FejNAweOeycTTPcvaJsvYX1cuEzdd12h7YFyJem', NULL, '2023-02-03 11:36:32', '2023-02-03 11:36:32', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES (55, 'hai', 'ha1111i11212112sdas22@gmail.com', NULL, '$2y$10$G69Kjj4MjBJaqKlnoR8ZYe6gdgnzzTvxBcYmcmvmYL6RuGkV5v.yq', NULL, '2023-02-03 11:37:26', '2023-02-03 11:37:26', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES (57, 'hai', 'ha1111i68711212112sdas22@gmail.com', NULL, '$2y$10$VMCgg83zS02sQFmzNGl46ODW5jFeNoVubj4ttQirgm3pX2w8rsF02', NULL, '2023-02-03 12:28:00', '2023-02-03 12:28:00', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES (58, 'hai', 'haidz01@gmail.com', NULL, NULL, NULL, '2023-03-13 07:44:04', '2023-03-13 07:44:04', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES (64, 'hai', 'haidz012@gmail.com', NULL, NULL, NULL, '2023-03-13 07:50:39', '2023-03-13 07:50:39', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES (65, 'hai', 'haidz0123@gmail.com', NULL, NULL, NULL, '2023-03-13 07:50:54', '2023-03-13 07:50:54', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES (66, 'hai', 'haidz01231@gmail.com', NULL, NULL, NULL, '2023-03-13 07:51:12', '2023-03-13 07:51:12', NULL);
COMMIT;

-- ----------------------------
-- Table structure for users_permissions
-- ----------------------------
DROP TABLE IF EXISTS `users_permissions`;
CREATE TABLE `users_permissions` (
  `user_id` bigint unsigned NOT NULL,
  `permission_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `users_permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users_permissions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users_roles
-- ----------------------------
DROP TABLE IF EXISTS `users_roles`;
CREATE TABLE `users_roles` (
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `users_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users_roles
-- ----------------------------
BEGIN;
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
