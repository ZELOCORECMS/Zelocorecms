"use strict";
var zc;
(zc ||= {}).privateApis = (() => {
  var __defProp = Object.defineProperty;
  var __getOwnPropDesc = Object.getOwnPropertyDescriptor;
  var __getOwnPropNames = Object.getOwnPropertyNames;
  var __hasOwnProp = Object.prototype.hasOwnProperty;
  var __export = (target, all) => {
    for (var name in all)
      __defProp(target, name, { get: all[name], enumerable: true });
  };
  var __copyProps = (to, from, except, desc) => {
    if (from && typeof from === "object" || typeof from === "function") {
      for (let key of __getOwnPropNames(from))
        if (!__hasOwnProp.call(to, key) && key !== except)
          __defProp(to, key, { get: () => from[key], enumerable: !(desc = __getOwnPropDesc(from, key)) || desc.enumerable });
    }
    return to;
  };
  var __toCommonJS = (mod) => __copyProps(__defProp({}, "__esModule", { value: true }), mod);

  // packages/private-apis/build-module/index.mjs
  var index_exports = {};
  __export(index_exports, {
    __dangerousOptInToUnstableAPIsOnlyForCoreModules: () => __dangerousOptInToUnstableAPIsOnlyForCoreModules
  });

  // packages/private-apis/build-module/implementation.mjs
  var CORE_MODULES_USING_PRIVATE_APIS = [
    "@zelocorecms/block-directory",
    "@zelocorecms/block-editor",
    "@zelocorecms/block-library",
    "@zelocorecms/blocks",
    "@zelocorecms/boot",
    "@zelocorecms/commands",
    "@zelocorecms/connectors",
    "@zelocorecms/workflows",
    "@zelocorecms/components",
    "@zelocorecms/core-commands",
    "@zelocorecms/core-data",
    "@zelocorecms/customize-widgets",
    "@zelocorecms/data",
    "@zelocorecms/edit-post",
    "@zelocorecms/edit-site",
    "@zelocorecms/edit-widgets",
    "@zelocorecms/editor",
    "@zelocorecms/font-list-route",
    "@zelocorecms/format-library",
    "@zelocorecms/patterns",
    "@zelocorecms/preferences",
    "@zelocorecms/reusable-blocks",
    "@zelocorecms/rich-text",
    "@zelocorecms/route",
    "@zelocorecms/router",
    "@zelocorecms/routes",
    "@zelocorecms/sync",
    "@zelocorecms/theme",
    "@zelocorecms/dataviews",
    "@zelocorecms/fields",
    "@zelocorecms/lazy-editor",
    "@zelocorecms/media-utils",
    "@zelocorecms/upload-media",
    "@zelocorecms/global-styles-ui",
    "@zelocorecms/ui"
  ];
  var requiredConsent = "I acknowledge private features are not for use in themes or plugins and doing so will break in the next version of ZelocoreCMS.";
  var __dangerousOptInToUnstableAPIsOnlyForCoreModules = (consent, moduleName) => {
    if (!CORE_MODULES_USING_PRIVATE_APIS.includes(moduleName)) {
      throw new Error(
        `You tried to opt-in to unstable APIs as module "${moduleName}". This feature is only for JavaScript modules shipped with ZelocoreCMS core. Please do not use it in plugins and themes as the unstable APIs will be removed without a warning. If you ignore this error and depend on unstable features, your product will inevitably break on one of the next ZelocoreCMS releases.`
      );
    }
    if (consent !== requiredConsent) {
      throw new Error(
        `You tried to opt-in to unstable APIs without confirming you know the consequences. This feature is only for JavaScript modules shipped with ZelocoreCMS core. Please do not use it in plugins and themes as the unstable APIs will removed without a warning. If you ignore this error and depend on unstable features, your product will inevitably break on the next ZelocoreCMS release.`
      );
    }
    return {
      lock,
      unlock
    };
  };
  function lock(object, privateData) {
    if (!object) {
      throw new Error("Cannot lock an undefined object.");
    }
    const _object = object;
    if (!(__private in _object)) {
      _object[__private] = {};
    }
    lockedData.set(_object[__private], privateData);
  }
  function unlock(object) {
    if (!object) {
      throw new Error("Cannot unlock an undefined object.");
    }
    const _object = object;
    if (!(__private in _object)) {
      throw new Error(
        "Cannot unlock an object that was not locked before. "
      );
    }
    return lockedData.get(_object[__private]);
  }
  var lockedData = /* @__PURE__ */ new WeakMap();
  var __private = /* @__PURE__ */ Symbol("Private API ID");
  return __toCommonJS(index_exports);
})();
