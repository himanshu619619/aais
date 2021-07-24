!function(t){var e={};function r(n){if(e[n])return e[n].exports;var o=e[n]={i:n,l:!1,exports:{}};return t[n].call(o.exports,o,o.exports,r),o.l=!0,o.exports}r.m=t,r.c=e,r.d=function(t,e,n){r.o(t,e)||Object.defineProperty(t,e,{configurable:!1,enumerable:!0,get:n})},r.r=function(t){Object.defineProperty(t,"__esModule",{value:!0})},r.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return r.d(e,"a",e),e},r.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},r.p="",r(r.s=14)}([function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n,o=r(10),a=(n=o)&&n.__esModule?n:{default:n};e.default=function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.restUrl=WPML_TM_SETTINGS.restUrl,this.restNonce=WPML_TM_SETTINGS.restNonce,this.ateSettings=WPML_TM_SETTINGS.ate,this.currentUser=new a.default(WPML_TM_SETTINGS.currentUser)}},function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n,o=function(){function t(t,e){for(var r=0;r<e.length;r++){var n=e[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}return function(e,r,n){return r&&t(e.prototype,r),n&&t(e,n),e}}(),a=r(0),i=(n=a)&&n.__esModule?n:{default:n};var s=function(){function t(e){var r=e.getATEJobStatus,n=e.createATEJob,o=e.assignJob;!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.settings=new i.default,this.getATEJobStatus=r,this.createATEJob=n,this.assignJob=o}return o(t,[{key:"initEventHandlers",value:function(){for(var t=document.querySelectorAll(".js-translation-queue-edit"),e=0;e<t.length;++e){var r=t[e],n=r.dataset,o=n.ateJobUrl,a=n.jobId;r.href!==o&&(r.href=o),this.onJobButtonClick(a)}}},{key:"onJobButtonClick",value:function(t){var e=this;this.getJobButton(t).onclick=function(t){t.preventDefault();var r=t.currentTarget.dataset,n=r.ateJobUrl,o=r.jobId;e.openATEEditor({ateJobUrl:n,wpmlJobId:o})}}},{key:"getJobButton",value:function(t){return document.querySelector(".js-translation-queue-edit[data-job-id='"+t+"']")}},{key:"openATEEditor",value:function(t){var e=t.wpmlJobId,r=t.ateJobUrl;this.assignJob({jobId:e,translatorId:this.settings.currentUser.ID}).then(function(t){var e=t.assigned;e&&r&&(window.location.href=r),e||console.log("Translation job not assigned")})}}]),t}();e.default=s},function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n,o=function(){function t(t,e){for(var r=0;r<e.length;r++){var n=e[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}return function(e,r,n){return r&&t(e.prototype,r),n&&t(e,n),e}}(),a=r(0),i=(n=a)&&n.__esModule?n:{default:n};var s=function(t){function e(){return function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,e),function(t,e){if(!t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!e||"object"!=typeof e&&"function"!=typeof e?t:e}(this,(e.__proto__||Object.getPrototypeOf(e)).apply(this,arguments))}return function(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function, not "+typeof e);t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),e&&(Object.setPrototypeOf?Object.setPrototypeOf(t,e):t.__proto__=e)}(e,i.default),o(e,[{key:"get",value:function(t){return this.request(t,"GET")}},{key:"post",value:function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null;return this.request(t,"POST",e)}},{key:"request",value:function(t,e){var r=arguments.length>2&&void 0!==arguments[2]?arguments[2]:null,n={method:e.toUpperCase(),headers:{Accept:"application/json","Content-Type":"application/json","X-WP-Nonce":this.restNonce},credentials:"same-origin"};return"GET"!==n.method&&r&&(n.body="string"==typeof r?r:JSON.stringify(r)),this.handleRequest(this.restUrl+t,n)}},{key:"handleRequest",value:function(t,e){return fetch(t,e).then(function(t){if(!t.ok)throw new Error(t.statusText);return t.json()})}}]),e}();e.default=s},function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});e.default=function t(e){var r=this,n=e.wpmlAPI,o=e.ateAPI;!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.wpmlAPI=n,this.ateAPI=o,this.createATEJob=function(t,e,n){return r.wpmlAPI.fetchXLIFF(t).then(function(o){return r.ateAPI.createJob({xliff:o,ateReturnUrl:e,translator:n}).then(function(e){var n=e.job_id,o=e.job_url;return r.wpmlAPI.storeATEJob({jobId:t,ateJobData:{ateJobId:n,ateJobUrl:o}}).then(function(){return{jobId:t,ateJobId:n,ateJobUrl:o}})})})},this.getATEJobStatus=function(t){return r.ateAPI.getJobStatus(t).then(function(t){return{ateJobUrl:t.job_url}})},this.assignJob=function(t){var e=t.jobId,n=t.translatorId;return r.wpmlAPI.assignJob({jobId:e,translatorId:n})}}},function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=function(){function t(t,e){for(var r=0;r<e.length;r++){var n=e[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}return function(e,r,n){return r&&t(e.prototype,r),n&&t(e,n),e}}();var o=function(){function t(e){var r=e.wpmlAPI,n=e.ateAPI;!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.wpmlAPI=r,this.ateAPI=n}return n(t,[{key:"init",value:function(){var t=this,e=new URL(window.location).searchParams.get("ate-return-job");if(e){var r=this.findATEJobId(e),n=r.ateJobId,o=r.translator;n&&o&&this.ateAPI.getJobStatus(n).then(function(r){return t.ateJobStatusReturn({jobId:e,ateJobData:r})})}}},{key:"findATEJobId",value:function(t){var e=document.querySelector(".js-translation-queue-edit[data-job-id='"+t+"']").dataset;return{ateJobId:e.ateJobId,translator:e.translator}}},{key:"ateJobStatusReturn",value:function(t){var e=t.jobId,r=t.ateJobData;return this.wpmlAPI.storeATEJob({jobId:e,ateJobData:r})}}]),t}();e.default=o},function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});e.default={createJob:"/wpml/tm/v1/ate/jobs",getJobStatus:function(t){return"/wpml/tm/v1/ate/jobs/"+t}}},function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n,o=function(){function t(t,e){for(var r=0;r<e.length;r++){var n=e[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}return function(e,r,n){return r&&t(e.prototype,r),n&&t(e,n),e}}(),a=r(5),i=(n=a)&&n.__esModule?n:{default:n};var s=function(){function t(e){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.request=e}return o(t,[{key:"createJob",value:function(t){var e=t.xliff,r=t.returnURL,n=e.sourceLang,o=e.targetLang,a=e.content;return this.request.post(i.default.createJob,{source_language:n,target_language:o,file:{name:"some_page_en_fr.xliff",type:"data:application/x-xliff;base64",content:a},return_url:r})}},{key:"getJobStatus",value:function(t){return this.request.get(i.default.getJobStatus(t))}}]),t}();e.default=s},function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=function(){function t(t,e){for(var r=0;r<e.length;r++){var n=e[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}return function(e,r,n){return r&&t(e.prototype,r),n&&t(e,n),e}}();var o=function(){function t(e){var r=e.sourceLang,n=e.targetLang,o=e.content;!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this._sourceLang=r,this._targetLang=n,this._content=o}return n(t,[{key:"sourceLang",get:function(){return this._sourceLang}},{key:"targetLang",get:function(){return this._targetLang}},{key:"content",get:function(){return this._content}}]),t}();e.default=o},function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});e.default={fetchXLIFF:function(t){return"/wpml/tm/v1/xliff/fetch/"+t},storeATEJob:"/wpml/tm/v1/ate/jobs/store",assignJob:"/wpml/tm/v1/jobs/assign",disableRESTPickup:"/wpml/tm/v1/pickup/rest/disable",enableRESTPickup:"/wpml/tm/v1/pickup/rest/enable",setTranslationEditor:"/wpml/tm/v1/settings/translation_editor"}},function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=function(){function t(t,e){for(var r=0;r<e.length;r++){var n=e[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}return function(e,r,n){return r&&t(e.prototype,r),n&&t(e,n),e}}(),o=i(r(8)),a=i(r(7));function i(t){return t&&t.__esModule?t:{default:t}}var s=function(){function t(e){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.request=e}return n(t,[{key:"fetchXLIFF",value:function(t){return this.request.get(o.default.fetchXLIFF(t)).then(function(t){return new a.default(t)})}},{key:"storeATEJob",value:function(t){var e=t.jobId,r=t.ateJobData;return this.request.post(o.default.storeATEJob,{wpml_job_id:e,ate_job_data:r})}},{key:"assignJob",value:function(t){var e=t.jobId,r=t.translatorId;return this.request.post(o.default.assignJob,{jobId:e,translatorId:r})}}]),t}();e.default=s},function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});e.default=function t(e){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.ID=e.ID,this.caps=e.caps,this.roles=e.roles,this.user_email=e.data,this.user_login=e.data.user_email,this.user_nicename=e.data.user_login}},function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n,o=function(){function t(t,e){for(var r=0;r<e.length;r++){var n=e[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}return function(e,r,n){return r&&t(e.prototype,r),n&&t(e,n),e}}(),a=r(1);(n=a)&&n.__esModule;var i=function(){function t(e){var r=e.translationQueue,n=e.returnJobHandler;!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.translationQueue=r,this.returnJobHandler=n}return o(t,[{key:"init",value:function(){this.translationQueue.initEventHandlers(),this.returnJobHandler.init()}}]),t}();e.default=i},function(t,e,r){"use strict";var n=l(r(11)),o=l(r(9)),a=l(r(6)),i=l(r(4)),s=l(r(1)),u=l(r(3)),f=l(r(2));function l(t){return t&&t.__esModule?t:{default:t}}document.addEventListener("DOMContentLoaded",function(){var t=new f.default,e={wpmlAPI:new o.default(t),ateAPI:new a.default(t)},r=new u.default(e),l=new s.default({createATEJob:r.createATEJob,getATEJobStatus:r.getATEJobStatus,assignJob:r.assignJob});new n.default({translationQueue:l,returnJobHandler:new i.default(e)}).init()})},function(t,e){!function(t){"use strict";if(!t.fetch){var e={searchParams:"URLSearchParams"in t,iterable:"Symbol"in t&&"iterator"in Symbol,blob:"FileReader"in t&&"Blob"in t&&function(){try{return new Blob,!0}catch(t){return!1}}(),formData:"FormData"in t,arrayBuffer:"ArrayBuffer"in t};if(e.arrayBuffer)var r=["[object Int8Array]","[object Uint8Array]","[object Uint8ClampedArray]","[object Int16Array]","[object Uint16Array]","[object Int32Array]","[object Uint32Array]","[object Float32Array]","[object Float64Array]"],n=function(t){return t&&DataView.prototype.isPrototypeOf(t)},o=ArrayBuffer.isView||function(t){return t&&r.indexOf(Object.prototype.toString.call(t))>-1};l.prototype.append=function(t,e){t=s(t),e=u(e);var r=this.map[t];this.map[t]=r?r+","+e:e},l.prototype.delete=function(t){delete this.map[s(t)]},l.prototype.get=function(t){return t=s(t),this.has(t)?this.map[t]:null},l.prototype.has=function(t){return this.map.hasOwnProperty(s(t))},l.prototype.set=function(t,e){this.map[s(t)]=u(e)},l.prototype.forEach=function(t,e){for(var r in this.map)this.map.hasOwnProperty(r)&&t.call(e,this.map[r],r,this)},l.prototype.keys=function(){var t=[];return this.forEach(function(e,r){t.push(r)}),f(t)},l.prototype.values=function(){var t=[];return this.forEach(function(e){t.push(e)}),f(t)},l.prototype.entries=function(){var t=[];return this.forEach(function(e,r){t.push([r,e])}),f(t)},e.iterable&&(l.prototype[Symbol.iterator]=l.prototype.entries);var a=["DELETE","GET","HEAD","OPTIONS","POST","PUT"];y.prototype.clone=function(){return new y(this,{body:this._bodyInit})},p.call(y.prototype),p.call(m.prototype),m.prototype.clone=function(){return new m(this._bodyInit,{status:this.status,statusText:this.statusText,headers:new l(this.headers),url:this.url})},m.error=function(){var t=new m(null,{status:0,statusText:""});return t.type="error",t};var i=[301,302,303,307,308];m.redirect=function(t,e){if(-1===i.indexOf(e))throw new RangeError("Invalid status code");return new m(null,{status:e,headers:{location:t}})},t.Headers=l,t.Request=y,t.Response=m,t.fetch=function(t,r){return new Promise(function(n,o){var a=new y(t,r),i=new XMLHttpRequest;i.onload=function(){var t,e,r={status:i.status,statusText:i.statusText,headers:(t=i.getAllResponseHeaders()||"",e=new l,t.split(/\r?\n/).forEach(function(t){var r=t.split(":"),n=r.shift().trim();if(n){var o=r.join(":").trim();e.append(n,o)}}),e)};r.url="responseURL"in i?i.responseURL:r.headers.get("X-Request-URL");var o="response"in i?i.response:i.responseText;n(new m(o,r))},i.onerror=function(){o(new TypeError("Network request failed"))},i.ontimeout=function(){o(new TypeError("Network request failed"))},i.open(a.method,a.url,!0),"include"===a.credentials&&(i.withCredentials=!0),"responseType"in i&&e.blob&&(i.responseType="blob"),a.headers.forEach(function(t,e){i.setRequestHeader(e,t)}),i.send(void 0===a._bodyInit?null:a._bodyInit)})},t.fetch.polyfill=!0}function s(t){if("string"!=typeof t&&(t=String(t)),/[^a-z0-9\-#$%&'*+.\^_`|~]/i.test(t))throw new TypeError("Invalid character in header field name");return t.toLowerCase()}function u(t){return"string"!=typeof t&&(t=String(t)),t}function f(t){var r={next:function(){var e=t.shift();return{done:void 0===e,value:e}}};return e.iterable&&(r[Symbol.iterator]=function(){return r}),r}function l(t){this.map={},t instanceof l?t.forEach(function(t,e){this.append(e,t)},this):Array.isArray(t)?t.forEach(function(t){this.append(t[0],t[1])},this):t&&Object.getOwnPropertyNames(t).forEach(function(e){this.append(e,t[e])},this)}function c(t){if(t.bodyUsed)return Promise.reject(new TypeError("Already read"));t.bodyUsed=!0}function d(t){return new Promise(function(e,r){t.onload=function(){e(t.result)},t.onerror=function(){r(t.error)}})}function h(t){var e=new FileReader,r=d(e);return e.readAsArrayBuffer(t),r}function b(t){if(t.slice)return t.slice(0);var e=new Uint8Array(t.byteLength);return e.set(new Uint8Array(t)),e.buffer}function p(){return this.bodyUsed=!1,this._initBody=function(t){if(this._bodyInit=t,t)if("string"==typeof t)this._bodyText=t;else if(e.blob&&Blob.prototype.isPrototypeOf(t))this._bodyBlob=t;else if(e.formData&&FormData.prototype.isPrototypeOf(t))this._bodyFormData=t;else if(e.searchParams&&URLSearchParams.prototype.isPrototypeOf(t))this._bodyText=t.toString();else if(e.arrayBuffer&&e.blob&&n(t))this._bodyArrayBuffer=b(t.buffer),this._bodyInit=new Blob([this._bodyArrayBuffer]);else{if(!e.arrayBuffer||!ArrayBuffer.prototype.isPrototypeOf(t)&&!o(t))throw new Error("unsupported BodyInit type");this._bodyArrayBuffer=b(t)}else this._bodyText="";this.headers.get("content-type")||("string"==typeof t?this.headers.set("content-type","text/plain;charset=UTF-8"):this._bodyBlob&&this._bodyBlob.type?this.headers.set("content-type",this._bodyBlob.type):e.searchParams&&URLSearchParams.prototype.isPrototypeOf(t)&&this.headers.set("content-type","application/x-www-form-urlencoded;charset=UTF-8"))},e.blob&&(this.blob=function(){var t=c(this);if(t)return t;if(this._bodyBlob)return Promise.resolve(this._bodyBlob);if(this._bodyArrayBuffer)return Promise.resolve(new Blob([this._bodyArrayBuffer]));if(this._bodyFormData)throw new Error("could not read FormData body as blob");return Promise.resolve(new Blob([this._bodyText]))},this.arrayBuffer=function(){return this._bodyArrayBuffer?c(this)||Promise.resolve(this._bodyArrayBuffer):this.blob().then(h)}),this.text=function(){var t,e,r,n=c(this);if(n)return n;if(this._bodyBlob)return t=this._bodyBlob,e=new FileReader,r=d(e),e.readAsText(t),r;if(this._bodyArrayBuffer)return Promise.resolve(function(t){for(var e=new Uint8Array(t),r=new Array(e.length),n=0;n<e.length;n++)r[n]=String.fromCharCode(e[n]);return r.join("")}(this._bodyArrayBuffer));if(this._bodyFormData)throw new Error("could not read FormData body as text");return Promise.resolve(this._bodyText)},e.formData&&(this.formData=function(){return this.text().then(v)}),this.json=function(){return this.text().then(JSON.parse)},this}function y(t,e){var r,n,o=(e=e||{}).body;if(t instanceof y){if(t.bodyUsed)throw new TypeError("Already read");this.url=t.url,this.credentials=t.credentials,e.headers||(this.headers=new l(t.headers)),this.method=t.method,this.mode=t.mode,o||null==t._bodyInit||(o=t._bodyInit,t.bodyUsed=!0)}else this.url=String(t);if(this.credentials=e.credentials||this.credentials||"omit",!e.headers&&this.headers||(this.headers=new l(e.headers)),this.method=(r=e.method||this.method||"GET",n=r.toUpperCase(),a.indexOf(n)>-1?n:r),this.mode=e.mode||this.mode||null,this.referrer=null,("GET"===this.method||"HEAD"===this.method)&&o)throw new TypeError("Body not allowed for GET or HEAD requests");this._initBody(o)}function v(t){var e=new FormData;return t.trim().split("&").forEach(function(t){if(t){var r=t.split("="),n=r.shift().replace(/\+/g," "),o=r.join("=").replace(/\+/g," ");e.append(decodeURIComponent(n),decodeURIComponent(o))}}),e}function m(t,e){e||(e={}),this.type="default",this.status="status"in e?e.status:200,this.ok=this.status>=200&&this.status<300,this.statusText="statusText"in e?e.statusText:"OK",this.headers=new l(e.headers),this.url=e.url||"",this._initBody(t)}}("undefined"!=typeof self?self:this)},function(t,e,r){r(13),t.exports=r(12)}]);
//# sourceMappingURL=app.js.map