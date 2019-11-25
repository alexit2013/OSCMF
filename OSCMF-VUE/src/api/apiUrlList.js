/**
 * 所有的请求接口全部在此定义
 */
const api = {
  Login: '/admin/login',
  Logout: '/admin/logout',
  ForgePassword: '/auth/forge-password',
  Register: '/auth/register',
  twoStepCode: '/auth/2step-code',
  SendSms: '/account/sms',
  SendSmsErr: '/account/sms_err',
  // get my info
  UserInfo: '/user/info'
}
export default api
