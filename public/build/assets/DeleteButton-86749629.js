import{_ as l}from"./_plugin-vue_export-helper-c27b6911.js";import{o as s,g as a,a as o}from"./app-d0964fae.js";const r={name:"DeleteButton",methods:{handleClick(){confirm("Are you sure you want to delete this item?")&&this.$emit("delete")}}},i=o("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor",class:"w-4 h-4"},[o("path",{"fill-rule":"evenodd",d:"M13.414 10l4.293-4.293a1 1 0 1 0-1.414-1.414L12 8.586 7.707 4.293a1 1 0 0 0-1.414 1.414L10.586 10l-4.293 4.293a1 1 0 1 0 1.414 1.414L12 11.414l4.293 4.293a1 1 0 0 0 1.414-1.414L13.414 10z","clip-rule":"evenodd"})],-1),c=[i];function d(u,e,_,m,p,t){return s(),a("button",{class:"delete-button transition ease-in-out duration-150",onClick:e[0]||(e[0]=(...n)=>t.handleClick&&t.handleClick(...n))},c)}const v=l(r,[["render",d]]);export{v as D};
