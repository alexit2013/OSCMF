/**
 * 所有的请求接口全部在此定义
 */
const api = {
  // 登陆
  Login: '/admin/login',
  // 退出
  Logout: '/admin/logout',
  ForgePassword: '/auth/forge-password',
  Register: '/auth/register',
  twoStepCode: '/auth/2step-code',
  SendSms: '/account/sms',
  SendSmsErr: '/account/sms_err',
  // 获取用户信息
  UserInfo: '/admin/getUserInfo'
}
export default api
