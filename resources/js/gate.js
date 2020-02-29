export default class Gate {
    
    constructor(user) {
        this.user = user
    }
    
    authenticatedUserID() {
        return this.user.id
    }
}