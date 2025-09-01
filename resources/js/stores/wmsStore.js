import { defineStore } from 'pinia'

export const useWmsStore = defineStore('wms', {
  state: () => ({
    appName: 'LiveWMS.pl',
    version: '1.0.0',
    clickCount: 0,
    user: null,
    isAuthenticated: false
  }),

  getters: {
    displayName: (state) => `${state.appName} v${state.version}`,
    clickMessage: (state) => `Clicked ${state.clickCount} times`
  },

  actions: {
    incrementClick() {
      this.clickCount++
    },

    resetClick() {
      this.clickCount = 0
    },

    setUser(user) {
      this.user = user
      this.isAuthenticated = !!user
    },

    logout() {
      this.user = null
      this.isAuthenticated = false
    }
  }
})