/**
 * 向后端请求用户的菜单，动态生成路由
 */
import { constantRouterMap } from '@/config/router.config'
import { generatorDynamicRouter } from '@/router/generator-routers'

const permission = {
  state: {
    routers: constantRouterMap,
    addRouters: []
  },
  mutations: {
    SET_ROUTERS: (state, routers) => {
      state.addRouters = routers
      state.routers = constantRouterMap.concat(routers)
    }
  },
  actions: {
    getRouters ({ commit, getters }) {
      // 获取用户登陆时存的权限，后台返回的数据已转换好格式
      // console.log(getters.roles)
      return new Promise(resolve => {
        generatorDynamicRouter(getters.roles).then(routers => {
          commit('SET_ROUTERS', routers)
          resolve(routers)
        })
      })
    }
  }
}

export default permission
