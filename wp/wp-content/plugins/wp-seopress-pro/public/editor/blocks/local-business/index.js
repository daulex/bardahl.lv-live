!function(){"use strict";var e,s={690:function(e,s,o){var l=window.wp.element,n=window.wp.i18n,r=window.wp.blocks,t=window.wp.blockEditor,i=window.wp.components,p=e=>{let{attributes:s,setAttributes:o,options:r}=e;const{field:t}=s;return(0,l.createElement)(i.SelectControl,{label:(0,n.__)("Select the field to display","wp-seopress-pro"),value:t,options:r,onChange:e=>o({field:e,inline:!1})})},a=e=>{let{attributes:s,setAttributes:o,options:r}=e;const{field:a,inline:c,hideClosedDays:u,external:_}=s;return(0,l.createElement)(t.InspectorControls,null,(0,l.createElement)(i.PanelBody,{title:(0,n.__)("Field settings","wp-seopress-pro")},(0,l.createElement)(i.PanelRow,null,(0,l.createElement)(p,{attributes:s,setAttributes:o,options:r})),(0,l.createElement)(i.PanelRow,null,"seopress_local_business_opening_hours"===a?(0,l.createElement)(i.CheckboxControl,{label:(0,n.__)("Hide closed days","wp-seopress-pro"),checked:u,onChange:e=>o({hideClosedDays:e})}):(0,l.createElement)(i.CheckboxControl,{label:(0,n.__)("Display the field value inline","wp-seopress-pro"),checked:c,onChange:e=>o({inline:e})})),(0,l.createElement)(i.PanelRow,null,"seopress_local_business_map_link"===a&&(0,l.createElement)(i.CheckboxControl,{label:(0,n.__)("Open link in a new tab","wp-seopress-pro"),checked:_,onChange:e=>o({external:e})}))))},c=window.wp.serverSideRender,u=o.n(c),_=JSON.parse('{"u2":"wpseopress/local-business-field"}');(0,r.registerBlockType)(_.u2,{parent:["wpseopress/local-business"],title:(0,n.__)("Local Business","wp-seopress-pro"),description:(0,n.__)("Displays a single Local Business field","wp-seopress-pro"),edit:function(e){let{attributes:s,setAttributes:o}=e;const{field:r,inline:i}=s,c=[{label:(0,n.__)("Street Address","wp-seopress-pro"),className:"sp-street",value:"seopress_local_business_street_address"},{label:(0,n.__)("Zipcode","wp-seopress-pro"),className:"sp-code",value:"seopress_local_business_postal_code"},{label:(0,n.__)("City","wp-seopress-pro"),className:"sp-city",value:"seopress_local_business_address_locality"},{label:(0,n.__)("State","wp-seopress-pro"),className:"sp-state",value:"seopress_local_business_region"},{label:(0,n.__)("Country","wp-seopress-pro"),className:"sp-country",value:"seopress_local_business_country"},{label:(0,n.__)("Phone","wp-seopress-pro"),className:"sp-phone",value:"seopress_local_business_phone"},{label:(0,n.__)("Map link","wp-seopress-pro"),className:"sp-map-link",value:"seopress_local_business_map_link"},{label:(0,n.__)("Opening hours","wp-seopress-pro"),className:"sp-opening-hours",value:"seopress_local_business_opening_hours"}],_=i?"span":"div";return(0,l.createElement)(_,(0,t.useBlockProps)({className:r}),(0,l.createElement)(a,{attributes:s,setAttributes:o,options:c}),r?(0,l.createElement)(u(),{block:"wpseopress/local-business-field",attributes:s}):(0,l.createElement)(p,{attributes:s,setAttributes:o,options:c}))},save:()=>null});var d=JSON.parse('{"u2":"wpseopress/local-business"}');(0,r.registerBlockType)(d.u2,{title:(0,n.__)("Local Business","wp-seopress-pro"),description:(0,n.__)("Displays Local Business information","wp-seopress-pro"),edit:function(){const e=[["core/heading",{placeholder:(0,n.__)("Title","wp-seopress-pro")}],["core/paragraph",{placeholder:(0,n.__)("Description","wp-seopress-pro")}],["wpseopress/local-business-field",{field:"seopress_local_business_street_address",inline:!1}],["wpseopress/local-business-field",{field:"seopress_local_business_postal_code",inline:!0}],["wpseopress/local-business-field",{field:"seopress_local_business_address_locality",inline:!0}],["wpseopress/local-business-field",{field:"seopress_local_business_region",inline:!1}],["wpseopress/local-business-field",{field:"seopress_local_business_country",inline:!1}],["wpseopress/local-business-field",{field:"seopress_local_business_phone",inline:!1}],["wpseopress/local-business-field",{field:"seopress_local_business_map_link",inline:!1}],["wpseopress/local-business-field",{field:"seopress_local_business_opening_hours",inline:!1}]];return(0,l.createElement)("div",(0,t.useBlockProps)(),(0,l.createElement)(t.InnerBlocks,{allowedBlocks:["core/paragraph","core/heading"],template:e}))},save:()=>(0,l.createElement)("div",t.useBlockProps.save(),(0,l.createElement)(t.InnerBlocks.Content,null))})}},o={};function l(e){var n=o[e];if(void 0!==n)return n.exports;var r=o[e]={exports:{}};return s[e](r,r.exports,l),r.exports}l.m=s,e=[],l.O=function(s,o,n,r){if(!o){var t=1/0;for(c=0;c<e.length;c++){o=e[c][0],n=e[c][1],r=e[c][2];for(var i=!0,p=0;p<o.length;p++)(!1&r||t>=r)&&Object.keys(l.O).every((function(e){return l.O[e](o[p])}))?o.splice(p--,1):(i=!1,r<t&&(t=r));if(i){e.splice(c--,1);var a=n();void 0!==a&&(s=a)}}return s}r=r||0;for(var c=e.length;c>0&&e[c-1][2]>r;c--)e[c]=e[c-1];e[c]=[o,n,r]},l.n=function(e){var s=e&&e.__esModule?function(){return e.default}:function(){return e};return l.d(s,{a:s}),s},l.d=function(e,s){for(var o in s)l.o(s,o)&&!l.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:s[o]})},l.o=function(e,s){return Object.prototype.hasOwnProperty.call(e,s)},function(){var e={730:0,952:0};l.O.j=function(s){return 0===e[s]};var s=function(s,o){var n,r,t=o[0],i=o[1],p=o[2],a=0;if(t.some((function(s){return 0!==e[s]}))){for(n in i)l.o(i,n)&&(l.m[n]=i[n]);if(p)var c=p(l)}for(s&&s(o);a<t.length;a++)r=t[a],l.o(e,r)&&e[r]&&e[r][0](),e[r]=0;return l.O(c)},o=self.webpackChunkwp_seopress_pro=self.webpackChunkwp_seopress_pro||[];o.forEach(s.bind(null,0)),o.push=s.bind(null,o.push.bind(o))}();var n=l.O(void 0,[952],(function(){return l(690)}));n=l.O(n)}();