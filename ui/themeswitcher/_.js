import {setQueryParam} from "/system.js";
import {setParamOnUrls} from "/modifyurls.js";

/**
 * @param apiName
 * @param paramName
 * @returns {(function(*): void)|*}
 */
export function bstoggle(e, paramName) {
   let body = document.body
   const el=e.target
   const btn = e.target
   if (body.getAttribute('data-bs-theme') === 'light') {
      body.setAttribute('data-bs-theme', 'dark')
      btn.textContent = 'Light'
      setQueryParam(paramName, 'dark')
      setParamOnUrls(paramName, 'dark', e.detail.apiElement)
   } else {
      body.setAttribute('data-bs-theme', 'light')
      btn.textContent = 'Dark'
      setQueryParam(paramName, 'light')
      setParamOnUrls(paramName, 'light', e.detail.apiElement)
   }
}
